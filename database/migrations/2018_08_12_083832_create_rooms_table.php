<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('adress')->default('Nicolai building');
            $table->string('floor_nr');
            $table->string('main_pic_name')->default('no pic'); 
            // bookable No = 0 Some rooms might be given for long term, meaning they are not Bookable. 
            // bookable Yes = 1. They are bookable
            $table->boolean('bookable')->default('1');
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
        Schema::dropIfExists('rooms');
    }
}
