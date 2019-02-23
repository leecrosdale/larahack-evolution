<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('building_id');
            $table->unsignedInteger('supply_id');
            $table->unsignedInteger('multiplier')->default(1);
            $table->unsignedInteger('amount')->default(1);
            $table->timestamps();

            $table->foreign('building_id')->references('id')->on('buildings');
            $table->foreign('supply_id')->references('id')->on('supplies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_requirements');
    }
}
