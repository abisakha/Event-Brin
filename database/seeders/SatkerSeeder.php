<?php

namespace Database\Seeders;

use App\Models\Satker;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    public function run(): void
    {
        Satker::create([
            'unit_name' => 'Pusat Data dan Informasi',
            'status' => true,
        ]);

        Satker::create([
            'unit_name' => 'Pusat Riset Informatika',
            'status' => true,
        ]);
    }
}