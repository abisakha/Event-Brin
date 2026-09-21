<?php

namespace App\DTO\Event;

class EventDTO
{
    public function __construct(
        public readonly int $satkerId,
        public readonly int $userId,
        public readonly string $eventName,
        public readonly ?string $description,
        public readonly string $location,
        public readonly string $startDate,
        public readonly string $endDate,
        public readonly string $registrationStart,
        public readonly string $registrationEnd,
        public readonly int $quota,
        public readonly string $status,
    ) {
    }
}