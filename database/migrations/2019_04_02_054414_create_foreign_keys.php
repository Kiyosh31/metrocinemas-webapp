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
        Schema::table('movie_screening', function (Blueprint $table) {
            $table->foreign('screening_id')
            ->references('id')
            ->on('screenings')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('movie_id')
            ->references('id')
            ->on('movies')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('screening_id')
            ->references('screening_id')
            ->on('movie_screening')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('movie_id')
            ->references('movie_id')->
            on('movie_screening')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });        

        Schema::table('screenings', function (Blueprint $table) {
            $table->foreign('auditorium_id')
            ->references('id')
            ->on('auditoriums')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('seats_reserved', function (Blueprint $table) {
            $table->foreign('reservation_id')
            ->references('id')
            ->on('reservations')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('screening_id')
            ->references('id')
            ->on('screenings')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
