<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar_name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 100);

            // Stats
            $table->unsignedInteger('level')->default(0);
            $table->unsignedInteger('experience')->default(0);
            $table->unsignedInteger('health')->default(500);
            $table->unsignedInteger('max_health')->default(500);
            $table->unsignedInteger('strength')->default(1);
            $table->unsignedInteger('stamina')->default(1);
            $table->unsignedInteger('energy')->default(100);
            $table->unsignedInteger('max_energy')->default(100);
            $table->dateTime('last_sleep')->nullable();
            $table->dateTime('last_heal')->nullable();
            $table->dateTime('last_train')->nullable();
            $table->dateTime('last_attack')->nullable();

            $table->unsignedInteger('location_id');
            $table->unsignedInteger('clan_id')->nullable();
            $table->unsignedInteger('age_id');

            $table->tinyInteger('active')->default(true);
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('clan_id')->references('id')->on('clans');
            $table->foreign('age_id')->references('id')->on('ages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
