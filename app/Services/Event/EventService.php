<?php

namespace App\Services\Event;

use App\DTO\Event\EventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Models\Event;
use App\Models\Satker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class EventService
{
    // Detail Event
    public function getMyEventDetail(int $eventId) : Event
    {
        return Event::query()
        ->withCount('registrations')
        ->findOrFail($eventId);

    }

    // Update Event
    public function update(int $eventId, UpdateEventDTO $dto ) : Event
    {
        // ambil data myEvent
        $event = $this->getMyEventDetail($eventId);

        // validate
        $this->validateEventData($dto);

        // Menyimpan informasi gambar lama
        $oldImage = $event->event_image;
        $newImage = null;

        //  // Menyiapkan data perubahan
        $data = [
            'event_name' => $dto->eventName,
            'description' => $dto->description,
            'format' => $dto->format,
            'location_area' => $dto->locationArea,
            'location' => $dto->location,
            'start_date' => $dto->startDate,
            'end_date' => $dto->endDate,
            'registration_start' => $dto->registrationStart,
            'registration_end' => $dto->registrationEnd,
            'quota' => $dto->quota,
            'status' => $dto->status->value,
        ];


        // Upload gambar baru hanya jika tersedia
        if ($dto->eventImage !== null) {
            $newImage = Storage::disk('s3')
                ->putFile('events', $dto->eventImage);

            if (!$newImage) {
                throw ValidationException::withMessages([
                    'event_image' => ['Gagal mengunggah gambar event.'],
                ]);
            }

            $data['event_image'] = $newImage;
        }

        try {
            // Memperbarui database
            $event->update($data);
        } catch (\Throwable $exception) {

            // Membersihkan gambar baru jika database gagal
            if ($newImage) {
                try {
                    Storage::disk('s3')->delete($newImage);
                } catch (\Throwable $storageException) {
                    Log::error('Gagal membersihkan gambar event baru.', [
                        'path' => $newImage,
                        'error' => $storageException->getMessage(),
                    ]);
                }
            }

            throw $exception;
        }

        // Menghapus gambar lama setelah database berhasil diperbarui
        if ($newImage && $oldImage && str_starts_with($oldImage, 'events/')) {
            try {
                Storage::disk('s3')->delete($oldImage);
            } catch (\Throwable $exception) {
                Log::error('Gagal menghapus gambar event lama.', [
                    'path' => $oldImage,
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        return $event->refresh();
    }

    // Menghapus event milik pengguna yang login
    public function delete(int $eventId): void
    {
        // Memastikan pengguna merupakan pemilik event
        $event = $this->getMyEventDetail($eventId);

        // Menyimpan path gambar sebelum data dihapus
        $imagePath = $event->event_image;

        // Menghapus event dari database
        $event->delete();

        // Menghapus gambar dari MinIO
        // tanyakan str_starts
        if ($imagePath && str_starts_with($imagePath, 'events/')) {
            try {
                Storage::disk('s3')->delete($imagePath);
            } catch (\Throwable $exception) {
                Log::error('Gagal menghapus gambar event.', [
                    'event_id' => $eventId,
                    'path' => $imagePath,
                    'error' => $exception->getMessage(),
                ]);
            }
        }
    }


    public function create(EventDTO $dto): Event
    {
        // Mengambil Satker berdasarkan satkerId dari DTO.
        $satker = Satker::find($dto->satkerId);

        // Proteksi tambahan apabila Satker tidak ditemukan.
        if (!$satker) {
            throw ValidationException::withMessages([
                'satker_id' => ['Satker tidak ditemukan.'],
            ]);
        }

        // validasi
        $this->validateEventData($dto);

        // Upload gambar Event ke MinIO menggunakan disk S3.
        $imagePath = Storage::disk('s3')
        ->putFile('events', $dto->eventImage);

        try {
            // Menyimpan Event setelah seluruh aturan bisnis terpenuhi.
            return Event::create([
                'satker_id' => $dto->satkerId,

                // satker_name berasal dari database Satker.
                'satker_name' => $satker->unit_name,

                // user_id berasal dari authenticated user melalui DTO.
                'user_id' => $dto->userId,

                'event_name' => $dto->eventName,
                'event_image' => $imagePath,
                'description' => $dto->description,
                'location' => $dto->location,
                'format'=>$dto->format,
                'location_area'=>$dto->locationArea,

                // DTO sudah mengubah tanggal menjadi CarbonImmutable.
                'start_date' => $dto->startDate,
                'end_date' => $dto->endDate,
                'registration_start' => $dto->registrationStart,
                'registration_end' => $dto->registrationEnd,

                'quota' => $dto->quota,

                // Mengambil string dari EventStatus Enum.
                'status' => $dto->status->value,
            ]);
        } catch (\Throwable $exception) {

            // Jika database gagal setelah gambar berhasil di-upload,
            // hapus gambar agar tidak menjadi file yatim di MinIO.
            Storage::disk('s3')->delete($imagePath);

            throw $exception;
        }
    }

    // validata Business Rule
        public function validateEventData(EventDTO|UpdateEventDTO $dto)
    {

        // Pendaftaran harus dibuka sebelum pendaftaran ditutup.
        if ($dto->registrationStart >= $dto->registrationEnd) {
            throw ValidationException::withMessages([
                'registration_start' => [
                    'Waktu mulai pendaftaran harus sebelum waktu selesai pendaftaran.'
                ],
            ]);
        }

        // Pendaftaran tidak boleh ditutup setelah Event sudah dimulai.
        if ($dto->registrationEnd > $dto->startDate) {
            throw ValidationException::withMessages([
                'registration_end' => [
                    'Pendaftaran harus berakhir sebelum atau pada waktu event dimulai.'
                ],
            ]);
        }

        // Event harus dimulai sebelum Event berakhir.
        if ($dto->startDate >= $dto->endDate) {
            throw ValidationException::withMessages([
                'start_date' => [
                    'Waktu mulai event harus sebelum waktu selesai event.'
                ],
            ]);
        }

        // jikan event di venue wajib isi location area.
        if ($dto->format == 'offline' && empty($dto->locationArea)) {
            throw ValidationException::withMessages([
                'location_area' => [
                    'wajib mengisi locarion area jika event di venue'
                ],
            ]);
        }

        // jikan event di venue wajib isi location area.
        if ($dto->quota <= 0) {
            throw ValidationException::withMessages([
                'qouta' => [
                    'qouta harus lebih dari 0'
                ],
            ]);
        }

        // 7. Event online harus menggunakan link
        if ($dto->format === 'online' && !filter_var($dto->location, FILTER_VALIDATE_URL)) {
            throw ValidationException::withMessages([
                'location' => [
                    'Event online harus memiliki link yang valid.'
                ],
            ]);
        }

    }

}
