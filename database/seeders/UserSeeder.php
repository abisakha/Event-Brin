<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username_intra' => null,
            'satker_id' => 1,
            'satker_name' => 'Pusat data dan Informasi',
            'name' => 'Agus Dummy',
            'email' => 'agus@example.test',
            'password' => 'password',
            'user_type' => 'intern',
            'status' => true,
        ]);

        User::create([
            'username_intra' => null,
            'satker_id' => 2,
            'satker_name' => 'Pusat data dan Informasi',
            'name' => 'User Dummy',
            'email' => 'user@example.test',
            'password' => 'password',
            'user_type' => 'intern',
            'status' => true,
        ]);
    }
}