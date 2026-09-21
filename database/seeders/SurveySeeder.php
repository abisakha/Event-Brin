<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    public function run(): void
    {
        $event = Event::firstOrFail();

        Survey::create([
            'event_id' => $event->id,
        ]);
    }
}