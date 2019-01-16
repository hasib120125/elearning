<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exam_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->datetime('taken_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->json('state')->nullable();
            $table->string('email_body', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('exam_user');
    }
}
