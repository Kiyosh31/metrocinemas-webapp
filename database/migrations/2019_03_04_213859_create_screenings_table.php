<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('seat_reserved_id');
            $table->timestamp('start');
            $table->timestamp('finish');
            $table->timestamps();
        });

        Schema::table('screenings', function(Blueprint $table) {
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('seat_reserved_id')->references('id')->on('seats_reserved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screanings');
    }
}
