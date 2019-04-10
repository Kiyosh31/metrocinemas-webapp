<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('screenings_has_movies', function (Blueprint $table) {
            $table->foreign('screening_id')->references('id')->on('screenings');
            $table->foreign('movie_id')->references('id')->on('movies');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('screenings_has_movies_screening_id')->references('screening_id')->on('screenings_has_movies');
            $table->foreign('screenings_has_movies_movie_id')->references('movie_id')->on('screenings_has_movies');
        });        

        Schema::table('screenings', function (Blueprint $table) {
            $table->foreign('auditorium_id')->references('id')->on('auditoriums');
        });

        Schema::table('seats', function (Blueprint $table) {
            $table->foreign('auditorium_id')->references('id')->on('auditoriums');
        });

        Schema::table('seats_reserved', function (Blueprint $table) {
            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('screening_id')->references('id')->on('screenings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('foreign_keys');
    }
}
