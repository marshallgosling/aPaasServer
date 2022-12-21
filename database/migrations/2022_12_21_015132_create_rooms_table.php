<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('password', 20)->nullable();
            $table->string('roomNo', 20)->unique();
            $table->unsignedTinyInteger('isPrivate')->default(0);
            $table->string('createNo', 20);
            $table->string('bgOption', 20)->default('0');
            $table->string('soundEffect', 20)->default('0');
            $table->string('belCanto', 20)->default('0');
            $table->string('icon', 10)->default('0');
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('roomPeopleNum')->default(0);
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->string('openId', 32)->nullable();
            $table->string('userNo', 32)->unique();
            $table->string('headUrl', 255)->default('');
            $table->unsignedTinyInteger('sex')->default(0);
            $table->string('mobile', 20);
            $table->unsignedTinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
