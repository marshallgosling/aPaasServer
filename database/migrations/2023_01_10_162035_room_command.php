<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoomCommand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_room_command', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('data');
            $table->unsignedInteger('room_id')->default(0);
            $table->unsignedSmallInteger('status')->default(0);
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
        Schema::dropIfExists('fa_room_command');
    }
}
