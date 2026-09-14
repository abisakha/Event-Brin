<?php

namespace App\Services\Event;

use App\DTO\Event\EventDTO;
use App\Models\Event;
use App\Models\Satker;
use Illuminate\Validation\ValidationException;

class EventService
{
    public function create(EventDTO $dto): Event
    {
        $satker = Satker::find($dto->satkerId);

        if (!$satker) {
            throw ValidationException::withMessages([
                'satker_id' => ['Satker tidak ditemukan.'],
            ]);
        }

        if ($dto->registrationStart >= $dto->registrationEnd) {
            throw ValidationException::withMessages([
                'registration_start' => [
                    'Waktu mulai pendaftaran harus sebelum waktu selesai pendaftaran.'
                ],
            ]);
        }

        if ($dto->registrationEnd > $dto->startDate) {
            throw ValidationException::withMessages([
                'registration_end' => [
                    'Pendaftaran harus berakhir sebelum atau pada waktu event dimulai.'
                ],
            ]);
        }

        if ($dto->startDate >= $dto->endDate) {
            throw ValidationException::withMessages([
                'start_date' => [
                    'Waktu mulai event harus sebelum waktu selesai event.'
                ],
            ]);
        }

        if ($dto->quota <= 0) {
            throw ValidationException::withMessages([
                'quota' => [
                    'Quota harus lebih besar dari 0.'
                ],
            ]);
        }

        return Event::create([
            'satker_id' => $satker->id,
            'satker_name' => $satker->unit_name,
            'user_id' => $dto->userId,
            'event_name' => $dto->eventName,
            'description' => $dto->description,
            'location' => $dto->location,
            'start_date' => $dto->startDate,
            'end_date' => $dto->endDate,
            'registration_start' => $dto->registrationStart,
            'registration_end' => $dto->registrationEnd,
            'quota' => $dto->quota,
            'status' => $dto->status,
        ]);
    }
}