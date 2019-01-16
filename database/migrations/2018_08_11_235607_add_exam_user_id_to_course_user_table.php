<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExamUserIdToCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->unsignedInteger('exam_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropColumn('exam_user_id');
        });
    }
}
