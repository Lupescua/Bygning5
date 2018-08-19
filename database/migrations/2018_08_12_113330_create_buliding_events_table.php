<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulidingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildingEvents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id');
            $table->string('name');
            $table->text('description');
            $table->string('booking_date');
            $table->string('booking_hour');
            $table->string('image'); ; 
            $table->string('link'); 
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
        Schema::dropIfExists('buildingEvents');
    }
}
