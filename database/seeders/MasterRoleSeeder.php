<?php

namespace Database\Seeders;

use App\Models\MasterRole;
use Illuminate\Database\Seeder;

class MasterRoleSeeder extends Seeder
{
    public function run(): void
    {
        MasterRole::create([
            'name' => 'Organizer',
            'role_intra' => 'organizer',
        ]);

        MasterRole::create([
            'name' => 'Participant',
            'role_intra' => 'participant',
        ]);
    }
}