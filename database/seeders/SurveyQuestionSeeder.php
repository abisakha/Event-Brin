<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Database\Seeder;

class SurveyQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $survey = Survey::firstOrFail();

        SurveyQuestion::create([
            'survey_id' => $survey->id,
            'questionnaire' => 'Bagaimana penilaian Anda terhadap kegiatan ini?',
        ]);

        SurveyQuestion::create([
            'survey_id' => $survey->id,
            'questionnaire' => 'Bagaimana kualitas materi yang disampaikan?',
        ]);

        SurveyQuestion::create([
            'survey_id' => $survey->id,
            'questionnaire' => 'Apakah kegiatan ini bermanfaat bagi Anda?',
        ]);
    }
}