<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('description', 3072);
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedInteger('score');
            $table->string('type', 20);
            $table->unsignedInteger('total_no_of_questions')->default(0);
            $table->boolean('allow_previous')->default(false);
            $table->boolean('allow_dont_know')->default(false);
            $table->boolean('allow_result_mail')->default(false);
            $table->boolean('allow_negative_mark')->default('0')->nullable();
            $table->unsignedInteger('negative_mark_weight')->nullable();
            $table->unsignedInteger('status_id');
            $table->datetime('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
