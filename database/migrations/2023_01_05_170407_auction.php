<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Auction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_auction', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->default('');
            
            $table->unsignedInteger('room_id')->default(0);
            $table->unsignedInteger('owner_id')->default(0);
            $table->unsignedSmallInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('fa_auction_commodity', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('auction_id')->default(0);
            $table->unsignedInteger('commodity_id')->default(0);
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedInteger('floor_price')->default(0);
            $table->unsignedInteger('price_step')->default(0);
            $table->unsignedInteger('ceiling_price')->default(0);
            $table->unsignedInteger('max_for_person')->default(0);

        });

        Schema::create('fa_auction_bid', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('commodity_id')->default(0);
            $table->string('currency')->default('');
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
        Schema::dropIfExists('fa_auction');
        Schema::dropIfExists('fa_auction_commodity');
        Schema::dropIfExists('fa_auction_bid');
    }
}
