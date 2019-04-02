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
        Schema::table('users_type', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
        });

        Schema::table('screenings_has_movies', function (Blueprint $table) {
            $table->foreign('screenings_id')->references('id')->on('screenings');
            $table->foreign('movies_id')->references('id')->on('movies');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('screenings_has_movies_screenings_id')->references('screenings_id')->on('screenings_has_movies');
            $table->foreign('screenings_has_movies_movies_id')->references('movies_id')->on('screenings_has_movies');
            $table->foreign('seats_reserved_id')->references('id')->on('seats_reserved');
            $table->foreign('users_id')->references('id')->on('users');
        });        

        Schema::table('screenings', function (Blueprint $table) {
            $table->foreign('auditoriums_id')->references('id')->on('auditoriums');
        });

        Schema::table('seats', function (Blueprint $table) {
            $table->foreign('auditoriums_id')->references('id')->on('auditoriums');
            $table->foreign('reservations_id')->references('id')->on('reservations');
        });

        Schema::table('seats_reserved', function (Blueprint $table) {
            $table->foreign('seats_id')->references('id')->on('seats');
            $table->foreign('screenings_has_movies_screenings_id')->references('screenings_id')->on('screenings_has_movies');
            $table->foreign('screenings_has_movies_movies_id')->references('movies_id')->on('screenings_has_movies');
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
