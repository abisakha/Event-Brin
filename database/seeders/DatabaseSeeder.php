<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SatkerSeeder::class,
            UserSeeder::class,
            MasterRoleSeeder::class,
            UserRoleSeeder::class,
            EventSeeder::class,
            RegistrationSeeder::class,
            AttendanceSeeder::class,
            NotificationSeeder::class,
            SurveySeeder::class,
            SurveyQuestionSeeder::class,
            SurveyAnswerSeeder::class,
        ]);
    }
}
