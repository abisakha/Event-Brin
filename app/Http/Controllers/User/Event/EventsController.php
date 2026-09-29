<?php

namespace App\Http\Controllers\User\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\FilterEventRequest;
use App\Models\Satker;
use App\Services\Event\EventQueryService;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct(
        private EventQueryService $eventQueryService
    ) {}

    public function index(FilterEventRequest $request)
    {
        $filters = $request->validated();
        $events = $this->eventQueryService->getFilteredEvent($filters);
        $locationAreas =$this->eventQueryService->getLocationAreaEvent();
        $satkers = Satker::query()
            ->orderBy('unit_name')
            ->get();

        return view('user.events.event',[
            'title' => 'Events',
            'events' => $events,
            'locationAreas' => $locationAreas,
            'satkers' =>$satkers
        ]);


    }
}
