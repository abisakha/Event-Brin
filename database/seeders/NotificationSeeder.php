<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $event = Event::firstOrFail();

        $user = User::where('email', 'user@example.test')->firstOrFail();

        Notification::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'status' => 'unread',
            'date' => now(),
        ]);
    }
}