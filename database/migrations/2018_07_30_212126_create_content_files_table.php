<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentFilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('content_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('raw_name');
            $table->string('extension');
            $table->string('type')->nullable();
            $table->unsignedInteger('file_size')->nullable();
            $table->unsignedInteger('content_id')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('content_files');
    }
}
