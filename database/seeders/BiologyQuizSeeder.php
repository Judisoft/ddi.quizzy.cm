<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BiologyQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz_ids = \App\Models\Quiz::pluck('id');
        $questions = \App\Models\Question::where('subject_id', 1)
                                        ->where('topic_id', 1)
                                        ->inRandomOrder()
                                        ->limit(120)
                                        ->get();
        for($i = 0; $i < 25; $i++)
        {
            \App\Models\QuizQuestion::insert([
                'quiz_id' => 3,
                'question_id' => $questions[$i]->id
            ]);
        }
    }
}
