<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $registration = Registration::firstOrFail();

        Attendance::create([
            'event_id' => $registration->event_id,
            'registration_id' => $registration->id,
            'status' => 'present',
            'checked_in_at' => now(),
        ]);
    }
}