<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->default(0);
            $table->string('province_id')->default(0);
            $table->string('city_id')->default(0);
            $table->string('district_id')->default(0);
            $table->string('name', 20)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('contactor', 20)->nullable();
            $table->string('post_code', 10)->nullable();
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
        Schema::dropIfExists('fa_address');
    }
}
