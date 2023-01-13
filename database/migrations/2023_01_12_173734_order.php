<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 50);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('address_id')->default(0);
            $table->unsignedInteger('auction_id')->default(0);
            $table->unsignedSmallInteger('status')->default(0);
            $table->unsignedInteger('total_price')->default(0);
            $table->string('currency', 10)->nullable();
            $table->timestamps();
        });

        Schema::create('fa_order_commodity', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('commodity_id');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('price');
            $table->text('commodity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fa_order');
        Schema::dropIfExists('fa_order_commodity');
    }
}
