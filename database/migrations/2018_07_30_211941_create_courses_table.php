<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 3072)->nullable();
            $table->unsignedInteger('status_id');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedInteger('difficulty_id')->default(0);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
