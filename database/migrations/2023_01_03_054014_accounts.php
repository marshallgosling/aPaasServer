<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('facebook')->default('');
            $table->string('twiiter')->default('');
            $table->string('apple')->default('');
            $table->boolean('verified')->default(false);
            $table->unsignedSmallInteger('status')->default(0);
            $table->unsignedSmallInteger('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('fa_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('nickname')->default('');
            $table->string('profile_image')->default('');
            $table->string('gender')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("fa_users");
        Schema::dropIfExists('fa_profiles');
    }
}
