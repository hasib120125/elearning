<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamQuestionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exam_question', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('question_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exam_question');
    }
}
