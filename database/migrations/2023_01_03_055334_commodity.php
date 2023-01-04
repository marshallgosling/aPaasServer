<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commodity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_commodity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->default('');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('user_id')->default(0);
            $table->string('currency')->default('');
            $table->unsignedSmallInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('fa_commodity_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('commodity_id');
            $table->string('image_url');
            $table->unsignedInteger('order_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fa_commodity');
        Schema::dropIfExists('fa_commodity_images');
    }
}
