<?php
namespace App\Services\Event;
use App\DTO\Event\EventDTO;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;


class eventQueryService
{

    // admin event & Filters
    public function getAdminEvent(array $filters,User $user)
    {
        $query = event::query()
        ->withCount('registrations')
        ->latest();

        // cek kalo eo tampilkan sesuai id user
        if($user->hasRole('event_organizer') || $user->hasRole('event_officer'))
        {
            $query->where('user_id',$user->id);
        }
        // filter seacrh
         $query->when(
            $filters['search'] ?? false,
            fn ($query, $search)=>
                $query->where( fn ($query) =>
                    $query->where('event_name', 'like', '%'. $search .'%')
                    ->orWhere('location', 'like', '%'. $search .'%')
                )
            );

        // filter status
        $query->when(
            $filters['status'] ?? false,
            fn ($query,$status)=>
            $query->where('status', $status)
        );

        return $query->paginate(5)->withQueryString();
    }

    // get location
    public function getLocationAreaEvent()
    {
        return event::query()
        ->where('status','published')

        // ambil event yang tidak null
        ->whereNotNull('location_area')
        ->distinct()
        ->orderBy('location_area')

        // ambil hanya kolom location
        ->pluck('location_area');

    }

    // User Event & Filters
    public function getFilteredEvent(array $filters)
    {
        // quey() menyiapakan quey event untuk model ini
        $query = event::query()
        ->where('status','published');

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search)=>
                $query->where( fn ($query) =>
                    $query->where('event_name', 'like', '%'. $search .'%')
                    ->orWhere('location', 'like', '%'. $search .'%')
                )
        );

        // fn itu arrow funntion yang hanya mengizinkan satu expression / kondisi
        // Filter sort
        $query->when(
            $filters['sort'] ?? false,
            function ($query, $sort) {
                if($sort === 'latest'){
                    $query->latest();
                }
                if($sort === 'oldest'){
                    $query ->oldest();
                }
            }
        );

        // where in karna pakai array
        $query->when(
            $filters['formats'] ?? false,
            fn($query, $formats) =>
                $query->whereIn('format', $formats)
        );

         $query->when(
            $filters['location_area'] ?? false,
            fn($query, $location_area)=>
                $query->where('location_area', $location_area)
        );

        $query->when(
            $filters['satker'] ?? false,
            fn($query, $satkerId)=>
                $query->where('satker_id', $satkerId)
        );

        $query->when(
            $filters['month'] ?? false,
            fn($query,$month)=>
            $query->whereMonth('start_date', $month)
        );

        $query->when(
            $filters['start_date'] ?? false,
            fn($query,$start_date)=>
            $query->whereDate('start_date','>=', $start_date)
        );

        $query->when(
            $filters['end_date'] ?? false,
            fn($query,$end_date)=>
            $query->whereDate('end_date','<=', $end_date)
        );

        return $query->paginate(8)->withQueryString();
    }

    // Home Event
    public function getPublishedEvent()
    {
        // mulai mengambil data dari tabe wvne
        return event::query()
            // kondisinya
            ->where('status','published')
            ->orderBy('start_date','asc')
            ->paginate(8)
            ->withQueryString();
    }
}
?>
