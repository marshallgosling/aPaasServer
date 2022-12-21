<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("auction", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('code', 64)->unique();
            $table->string('cover', 512);
            $table->string('owner', 64);
            $table->integer('status')->default(0);
            $table->integer('duration')->default(0);
            $table->string('channelid')->nullable();
            $table->integer('base_amount')->default(0);
            $table->integer('amount')->default(0);
            $table->integer('last_bid')->default(0);

            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamp('last_bid_at')->nullable();

            $table->timestamps();

            // $table->foreign("channelid")->references("channelid")->on("channel")->onDelete('cascade');

        });

        Schema::create("bid", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auction_id');
            $table->string('uid');
            $table->integer('amount')->default();
            $table->integer('status')->default(0);
            //$table->foreign("auction_id")->references("id")->on("auction")->onDelete('cascade');
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
        // Schema::table('auction', function (Blueprint $table) {
        //     $table->dropForeign('channelid');
        // });
        Schema::table('bid', function (Blueprint $table) {
            $table->dropForeign('auction_id');
        });
        Schema::dropIfExists('bid');
        Schema::dropIfExists('auction');
    }
}
