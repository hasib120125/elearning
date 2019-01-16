<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 3072);
            $table->string('answer', 3072)->nullable();
            $table->string('type', 13);
            $table->string('stat', 1000)->nullable();
            $table->json('options')->nullable();
            $table->datetime('expired_at')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
