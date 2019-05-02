<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieScreeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_screening', function (Blueprint $table) {
            $table->unsignedInteger('screening_id');
            $table->unsignedInteger('movie_id');
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
        Schema::dropIfExists('movie_screening');
    }
}
