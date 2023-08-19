<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhysicsQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz_ids = \App\Models\Quiz::pluck('id');
        $questions = \App\Models\Question::where('subject_id', 5)
                                        ->where('topic_id', 32)
                                        ->take(20)
                                        ->get();
        for($i = 0; $i < 19; $i++)
        {
            \App\Models\QuizQuestion::insert([
                'quiz_id' => 25,
                'question_id' => $questions[$i]->id
            ]);
        }
    }
}
