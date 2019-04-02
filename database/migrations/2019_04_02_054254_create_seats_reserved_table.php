<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsReservedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats_reserved', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seats_id');
            $table->unsignedInteger('screenings_has_movies_screenings_id');
            $table->unsignedInteger('screenings_has_movies_movies_id');
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
        Schema::dropIfExists('seats_reserved');
    }
}
