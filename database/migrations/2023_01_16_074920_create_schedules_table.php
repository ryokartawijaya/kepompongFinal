<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('meetingID')->nullable();
            $table->string('courseID')->nullable();
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('teacher')->nullable();
            $table->string('category')->nullable();
            $table->string('link')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();  
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
        Schema::dropIfExists('schedules');
    }
};
