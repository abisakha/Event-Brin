<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Services\Event\EventQueryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private EventQueryService $eventQueryService
    ) {}

    public function index()
    {
        $events = $this->eventQueryService->getPublishedEvent();

        return view('user.home',[
            'title' => 'Homes',
            'events' => $events

        ]);
    }

}
