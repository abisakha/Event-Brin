<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $event = Event::firstOrFail();

        $user = User::where('email', 'user@example.test')->firstOrFail();

        Registration::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'status' => 'registered',
            'date' => now(),
        ]);
    }
}