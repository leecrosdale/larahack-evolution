<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('building_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('level');
            $table->unsignedInteger('health');
            $table->unsignedInteger('max_health');
            $table->dateTime('next_work')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('building_id')->references('id')->on('buildings');
            $table->foreign('location_id')->references('id')->on('locations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_buildings');
    }
}
