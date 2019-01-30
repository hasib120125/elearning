<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveclassUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveclass_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('liveclass_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->datetime('taken_at')->nullable();
            $table->string('state')->nullable();
            $table->string('email_body', 1000)->nullable();
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
        Schema::dropIfExists('liveclass_user');
    }
}
