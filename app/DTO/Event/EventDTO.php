<?php

namespace App\DTO\Event;
use App\Enums\Event\EventStatus;
use Carbon\CarbonImmutable;
use Illuminate\Http\UploadedFile;


readonly class EventDTO
{
    public function __construct(

    // readonly agar value nya tidak berubah samai service dan balik lagi
        public int $satkerId,
        public int $userId,
        public string $eventName,

        // File gambar yang sudah lolos validasi FormRequest
        public UploadedFile $eventImage,

        public ?string $description,
        public string $location,
        public string $format,
         public ?string $locationArea,

    // carbon untuk class menangani tanggal dan waktu untuk OP datetime
        public CarbonImmutable $startDate,
        public CarbonImmutable $endDate,
        public CarbonImmutable $registrationStart,
        public CarbonImmutable $registrationEnd,
        public int $quota,

    // karna sudah di ataur di enums, tunggal panggil classnya
        public EventStatus $status,
    ) {}


    // factory method Factory method untuk mengubah array data menjadi EventDTO.
    public static function fromArray(array $data, int $userId) : self
    {
        return new self (
            satkerId:$data['satker_id'],

            // ambil data user di login
            userId:$userId,
            eventName:$data['event_name'],

            // image
            eventImage:$data['event_image'],

            // jika data kosong maka akan di isi null
            description:$data['description'] ?? null,
            location:$data['location'],
            format:$data['format'],
            locationArea:$data['location_area'] ?? null,
            startDate:CarbonImmutable::parse($data['start_date']),


            // “Isi parameter endDate dengan hasil konversi end_date menjadi objek CarbonImmutable.”
            endDate:CarbonImmutable::parse($data['end_date']),
            registrationStart:CarbonImmutable::parse($data['registration_start']),
            registrationEnd:CarbonImmutable::parse($data['registration_end']),
            quota:$data['quota'],
            status:EventStatus::from($data['status'])
        );
    }
}
