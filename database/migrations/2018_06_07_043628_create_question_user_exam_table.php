<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionUserExamTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exam_user_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_user_id');
            $table->unsignedInteger('question_id');
            $table->string('answer', 1072)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exam_user_question');
    }
}
