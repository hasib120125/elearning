<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssignmentFieldsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->boolean('is_self_assigned')->default(false);
            $table->boolean('is_admin_assigned')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropColumn('is_self_assigned');
            $table->dropColumn('is_admin_assigned');
        });
    }
}
