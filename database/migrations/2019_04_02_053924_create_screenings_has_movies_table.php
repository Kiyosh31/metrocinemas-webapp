<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreeningsHasMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings_has_movies', function (Blueprint $table) {
            $table->unsignedInteger('screenings_id');
            $table->unsignedInteger('movies_id');
            $table->timestamp('screening_start');
            $table->timestamp('screening_finish');
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
        Schema::dropIfExists('screenings_has_movies');
    }
}
