<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChemistryQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $quiz_ids = \App\Models\Quiz::pluck('id');
        $questions = \App\Models\Question::where('subject_id', 2)
                                        ->where('topic_id', 7)
                                        ->take(20)
                                        ->get();
        for($i = 0; $i < 19; $i++)
        {
            \App\Models\QuizQuestion::insert([
                'quiz_id' => 34,
                'question_id' => $questions[$i]->id
            ]);
        }
    }
}
