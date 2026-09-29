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

        $events = [
            [
                'event_name' => 'Seminar Teknologi Botani',
                'format' => 'offline',
                'location_area' => 'jakarta',
                'location' => 'Gedung KST BJ Habibie',
                'start_date' => '2026-10-10 09:00:00',
                'end_date' => '2026-10-10 15:00:00',
                'quota' => 60,
            ],
            [
                'event_name' => 'Workshop Artificial Intelligence',
                'format' => 'offline',
                'location_area' => 'bandung',
                'location' => 'Gedung BRIN Bandung',
                'start_date' => '2026-10-15 08:00:00',
                'end_date' => '2026-10-15 16:00:00',
                'quota' => 80,
            ],
            [
                'event_name' => 'Seminar Riset Kelautan',
                'format' => 'offline',
                'location_area' => 'jakarta',
                'location' => 'Gedung BRIN Thamrin',
                'start_date' => '2026-10-20 09:00:00',
                'end_date' => '2026-10-20 14:00:00',
                'quota' => 100,
            ],
            [
                'event_name' => 'Webinar Transformasi Digital',
                'format' => 'online',
                'location_area' => null,
                'location' => 'https://zoom.us/dummy-event-1',
                'start_date' => '2026-10-25 09:00:00',
                'end_date' => '2026-10-25 12:00:00',
                'quota' => 200,
            ],
            [
                'event_name' => 'Workshop Data Science',
                'format' => 'offline',
                'location_area' => 'bogor',
                'location' => 'KST Soekarno BRIN',
                'start_date' => '2026-11-05 08:00:00',
                'end_date' => '2026-11-05 16:00:00',
                'quota' => 50,
            ],
            [
                'event_name' => 'Seminar Teknologi Antariksa',
                'format' => 'offline',
                'location_area' => 'jakarta',
                'location' => 'Gedung BJ Habibie',
                'start_date' => '2026-11-10 09:00:00',
                'end_date' => '2026-11-10 15:00:00',
                'quota' => 120,
            ],
            [
                'event_name' => 'Webinar Keamanan Siber',
                'format' => 'online',
                'location_area' => null,
                'location' => 'https://zoom.us/dummy-event-2',
                'start_date' => '2026-11-15 13:00:00',
                'end_date' => '2026-11-15 16:00:00',
                'quota' => 300,
            ],
            [
                'event_name' => 'Forum Riset Energi Terbarukan',
                'format' => 'offline',
                'location_area' => 'tangerang',
                'location' => 'Kawasan Sains dan Teknologi BRIN',
                'start_date' => '2026-11-20 09:00:00',
                'end_date' => '2026-11-20 15:30:00',
                'quota' => 90,
            ],
            [
                'event_name' => 'Seminar Inovasi Pangan',
                'format' => 'offline',
                'location_area' => 'bogor',
                'location' => 'Gedung Riset BRIN Bogor',
                'start_date' => '2026-12-05 08:30:00',
                'end_date' => '2026-12-05 14:00:00',
                'quota' => 75,
            ],
            [
                'event_name' => 'Webinar Teknologi Masa Depan',
                'format' => 'online',
                'location_area' => null,
                'location' => 'https://zoom.us/dummy-event-3',
                'start_date' => '2026-12-10 09:00:00',
                'end_date' => '2026-12-10 12:00:00',
                'quota' => 250,
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                [
                    'event_name' => $event['event_name'],
                ],
                [
                    'satker_id' => $satker->id,
                    'satker_name' => $satker->unit_name,
                    'user_id' => $user->id,
                    'event_image' => '/assets/images/card-image.png',
                    'format' => $event['format'],
                    'location_area' => $event['location_area'],
                    'description' => 'Event dummy untuk testing Event Management BRIN.',
                    'location' => $event['location'],
                    'start_date' => $event['start_date'],
                    'end_date' => $event['end_date'],
                    'registration_start' => '2026-09-01 08:00:00',
                    'registration_end' => '2026-10-09 23:59:59',
                    'quota' => $event['quota'],
                    'status' => 'published',
                ]
            );
        }
    }
}
