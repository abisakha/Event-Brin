<?php

namespace App\Http\Controllers\Admin\Event;

use App\DTO\Event\EventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Event;
use App\Models\Satker;
use App\Services\Event\EventQueryService;
use App\Services\Event\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;




class EventController extends Controller
{
    // Laravel otomatis menyediakan EventService untuk Controller ini.
    // Depedency Injection
    public function __construct(
        private EventService $eventService,
            private EventQueryService $eventQueryService
    ) {
    }

    public function index(Request $request)
    {

        // policy event
        // eevent class, karna belum ada evennya jadi dikirim clas modelnya saja
        Gate::authorize('viewAny',Event::class);

        $filters = $request->only('status','search');

        // Mengambil ID user yang sedang login
        // $userId = $request->user()->id;
        // pkai ini karna ambil dari ploci
        $user = $request->user();
        // $events=$this->eventService->getMyEvent($userId);
        $events =$this->eventQueryService->getAdminEvent($filters,$user);

        return view('admin.events.event', [
            'events' => $events,
            'title'=> 'Event'
        ]);
    }

    public function create()
    {
        // policy
         if(Gate::denies('create',Event::class)){
        return redirect()
            ->route('admin-event')
            ->with('error','Anda tidak memiliki akses untuk membuat event.');
    }

        // Mengambil semua data satker dari database
        $satkers = Satker::orderBy('unit_name')->get();

        // Mengirim data satker ke halaman create event
        return view('admin.events.create-event', [
            'title' => 'Create Event',
            'satkers' => $satkers,
            'event' => null
        ]);
    }

    public function store(StoreEventRequest $request)
    {
        // simpan dalan varibel dto dan kirimkan arry data ke method fromm arry
        // request data yang sudah valisdasi dan kirim user id yang login
        // nantinya hasilnya disimpan dlam dto
                Gate::authorize('create',Event::class);

        $dto = EventDTO::fromArray(
            $request->validated(),
            $request->user()->id
        );

        // kirim data dalam  V dto ke service dan panngil method create
        $this->eventService->create($dto);

        // Kembalikan response berupa redirect ke route admin.events.index, sambil membawa pesan success.
        return redirect()
        -> route('admin-event')
        ->with('succes', 'event berhasil di buat');
      }

    public function edit(Request $request,int $event)
    {
        $userId=$request->user()->id;

        Gate::authorize('update',$event);

        $eventData=$this->eventService->getMyEventDetail(
            $event
        );

        $satkers=Satker::orderBy('unit_name')->get();

        return view('admin.events.create-event',[
            'title'=>'Edit Event',
            'satkers'=>$satkers,
            'event'=>$eventData
        ]);
    }
    public function update(UpdateEventRequest $request, int $event)
    {
     Gate::authorize('update',$event);

        $dto = UpdateEventDTO::fromArray(
            $request->validated(),
            $request->user()->id
        );

        $this->eventService->update($event, $dto);

        // Kembalikan response berupa redirect ke route admin.events.index, sambil membawa pesan success.
        return redirect()
        -> route('admin-event')
        ->with('succes', 'event berhasil di buat');
    }

    // Menghapus event
    public function destroy(Request $request, int $event)
    {
        Gate::authorize('delete',$event);

        $this->eventService->delete($event);

        return redirect()
        -> route('admin-event')
        ->with('success', 'Event berhasil dihapus.');
    }
}
