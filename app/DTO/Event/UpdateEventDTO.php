<?php

namespace App\DTO\Event;
use App\Enums\Event\EventStatus;
use Carbon\CarbonImmutable;
use Illuminate\Http\UploadedFile;


readonly class UpdateEventDTO
{
    public function __construct(public int $userId,
        public string $eventName,

        // bisa bull karna sudah pakai data lama
        public ?UploadedFile $eventImage,
        public ?string $description,
        public string $format,
        public ?string $locationArea,
        public string $location,
        public CarbonImmutable $startDate,
        public CarbonImmutable $endDate,
        public CarbonImmutable $registrationStart,
        public CarbonImmutable $registrationEnd,
        public int $quota,
        public EventStatus $status)
    {}

    // Mengubah hasil validasi FormRequest menjadi DTO
    public static function fromArray(array $data, int $userId): self
    {
        return new self(
            userId: $userId,
            eventName: $data['event_name'],
            eventImage: $data['event_image'] ?? null,
            description: $data['description'] ?? null,
            format: $data['format'],

            // tanyain
            locationArea: $data['format'] === 'online'
                ? null
                : ($data['location_area'] ?? null),
            location: $data['location'],
            startDate: CarbonImmutable::parse($data['start_date']),
            endDate: CarbonImmutable::parse($data['end_date']),
            registrationStart: CarbonImmutable::parse($data['registration_start']),
            registrationEnd: CarbonImmutable::parse($data['registration_end']),
            quota: (int) $data['quota'],
            status: EventStatus::from($data['status'])
        );
    }
}

