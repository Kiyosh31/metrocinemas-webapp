<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('screenings_has_movies_screenings_id');
            $table->unsignedInteger('screenings_has_movies_movies_id');
            $table->unsignedInteger('seats_reserved_id');
            $table->string('client_name', '32');
            $table->string('client_last_name', '32');
            $table->unsignedInteger('users_id');
            $table->integer('paid');
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
        Schema::dropIfExists('reservations');
    }
}
