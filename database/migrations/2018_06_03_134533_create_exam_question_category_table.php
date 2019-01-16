<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamQuestionCategoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exam_question_category', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('question_category_id');
            $table->unsignedInteger('no_of_questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exam_question_category');
    }
}
