<?php

namespace Database\Seeders;

use App\Models\MasterRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $organizer = MasterRole::where('name', 'Organizer')->firstOrFail();
        $participant = MasterRole::where('name', 'Participant')->firstOrFail();

        $userOrganizer = User::where('email', 'agus@example.test')->firstOrFail();
        $userParticipant = User::where('email', 'user@example.test')->firstOrFail();

        DB::table('user_role')->insert([
            [
                'user_id' => $userOrganizer->id,
                'master_role_id' => $organizer->id,
            ],
            [
                'user_id' => $userParticipant->id,
                'master_role_id' => $participant->id,
            ],
        ]);
    }
}