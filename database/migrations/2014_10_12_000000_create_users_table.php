<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('username', 100)->unique();
            $table->string('email', 100)->nullable();
            $table->string('code', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('designation', 200)->nullable();
            $table->tinyInteger('source')->default(2);
            $table->string('password', 200);
            $table->boolean('is_default_password')->default(true);
            $table->boolean('is_locked')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('division_id')->nullable();
            $table->rememberToken();
            $table->string('token', 2000)->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
