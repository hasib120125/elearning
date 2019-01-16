<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('allow_certificate')->nullable();
            $table->integer('threshold_mark')->unsigned()->nullable();
            $table->string('signer_name1',200)->nullable();
            $table->string('signer_position1',200)->nullable();
            $table->string('signer_sign1',100)->nullable();
            $table->string('signer_name2',200)->nullable();
            $table->string('signer_position2',200)->nullable();
            $table->string('signer_sign2',100)->nullable();
            $table->unsignedInteger('exam_user_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_extras');
    }
}
