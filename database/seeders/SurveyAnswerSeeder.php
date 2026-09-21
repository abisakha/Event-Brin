<?php

namespace Database\Seeders;

use App\Models\SurveyQuestion;
use App\Models\User;
use App\Models\SurveyAnswer;
use Illuminate\Database\Seeder;

class SurveyAnswerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@example.test')->firstOrFail();

        $questions = SurveyQuestion::all();

        foreach ($questions as $question) {
            SurveyAnswer::create([
                'survey_question_id' => $question->id,
                'user_id' => $user->id,
                'answer' => 'Sangat baik',
                'date' => now(),
            ]);
        }
    }
}