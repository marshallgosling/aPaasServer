<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Channels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("channel", function (Blueprint $table) {
            $table->increments('id');
            $table->string('channelid', 256);
            
            $table->string('owner', 64);
            $table->integer('status')->default(0);
            $table->string('appid');

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
        Schema::dropIfExists("channel");
    }
}
