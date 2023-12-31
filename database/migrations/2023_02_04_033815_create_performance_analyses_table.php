<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_analyses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('question_id');
            $table->boolean('answer_correct');
            $table->timestamps();

            $table->foreign('quiz_id')
                  ->references('id')
                  ->on('quizzes')
                  ->onUpdate('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade');
            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_analyses');
    }
}
