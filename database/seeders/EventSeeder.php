<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Satker;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $satker = Satker::firstOrFail();
        $user = User::where('email', 'agus@example.test')->firstOrFail();

        Event::create([
           'satker_id' => $satker->id,
            'satker_name' => $satker->unit_name,
            'user_id' => $user->id,
            'event_name' => 'Seminar Teknologi Dummy',
            'event_image' => '/assets/image/card-image.png',
            'description' => 'Event dummy untuk testing Event Management',
            'location' => 'Gedung BRIN',
            'start_date' => '2026-10-10 09:00:00',
            'end_date' => '2026-10-10 15:00:00',
            'registration_start' => '2026-09-01 08:00:00',
            'registration_end' => '2026-10-09 23:59:59',
            'quota' => 100,
            'status' => 'active'
        ]);

        Event::create([
           'satker_id' => $satker->id,
            'satker_name' => $satker->unit_name,
            'user_id' => $user->id,
            'event_name' => 'Seminar Teknologi Botani Dummy',
            'event_image' => '/assets/image/card-image.png',
            'description' => 'Event dummy untuk testing Event Management Event dummy untuk testing Event Management Event dummy untuk testing Event Management Event dummy untuk testing Event Management',
            'location' => 'Gedung KST Bj Habibie',
            'start_date' => '2026-11-10 09:00:00',
            'end_date' => '2026-11-10 15:00:00',
            'registration_start' => '2026-09-01 08:00:00',
            'registration_end' => '2026-10-09 23:59:59',
            'quota' => 60,
            'status' => 'active'
        ]);



    }
}
