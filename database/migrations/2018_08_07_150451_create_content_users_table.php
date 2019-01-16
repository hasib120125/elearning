<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('content_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('content_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('content_user');
    }
}
