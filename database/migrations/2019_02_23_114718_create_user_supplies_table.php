<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_supplies', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('supply_id');
            $table->unsignedInteger('amount');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_supplies');
    }
}
