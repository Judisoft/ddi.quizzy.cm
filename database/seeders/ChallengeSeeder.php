<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\WeekQuestion;
use \App\Models\Question;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = \App\Models\Subject::all();
        $last_week = 2;
        $current_week_id =  $last_week + 1;

        foreach($subjects as $subject) {
            switch($subject->title) {
                case 'Biology':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(40)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'Chemistry':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(25)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'Physics':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(25)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'French':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(5)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'General Knowledge':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(5)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
            }
        }
    }
}
