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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id();
            $table->string('userID')->unique();
            $table->string('courseID');
            $table->string('name');
            $table->string('address');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('dob');
            $table->string('school');
            $table->string('grade');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('category');
            $table->string('userCategory');
            $table->rememberToken();
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
        Schema::dropIfExists('tb_user');
    }
};
