<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class ExamAssignAddToTopFieldInCourseTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('courses', function ($table) {
            $table->boolean('is_top')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('courses', function ($table) {
            $table->dropColumn('is_top')->default(false);
        });
    }
}
