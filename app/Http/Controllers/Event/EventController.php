<?php

namespace App\Http\Controllers\Event;

use App\DTO\Event\EventDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Services\Event\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct(
        private EventService $eventService
    ) {
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $dto = new EventDTO(
            satkerId: $request->integer('satker_id'),
            userId: Auth::id(),
            eventName: $request->string('event_name')->toString(),
            description: $request->input('description'),
            location: $request->string('location')->toString(),
            startDate: $request->string('start_date')->toString(),
            endDate: $request->string('end_date')->toString(),
            registrationStart: $request->string('registration_start')->toString(),
            registrationEnd: $request->string('registration_end')->toString(),
            quota: $request->integer('quota'),
            status: $request->string('status')->toString(),
        );

        $event = $this->eventService->create($dto);

        return response()->json([
            'message' => 'Event berhasil dibuat',
            'data' => $event,
        ], 201);
    }
}