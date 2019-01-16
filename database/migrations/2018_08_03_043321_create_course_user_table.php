<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->datetime('taken_at')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->datetime('completed_at')->nullable();
            $table->json('state')->nullable();
            $table->unsignedInteger('extra_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
