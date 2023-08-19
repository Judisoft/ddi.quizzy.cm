<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = 8;
        $subject_id = 1;
        $team_id = 8;
        $title = 'Mechanics #2';
        \App\Models\Quiz::insert([
            'subject_id' => 5,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'user_id' => $user_id,
            'team_id' => $team_id,
            'attempts_permitted' => 3
            

        ]);
    }
}
