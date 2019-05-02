<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    // los que si se van a insertar
    // protected $fillable = ['movie_id', 'room_id', 'start', 'finish', 'active'];

    // los que no se van a insertar
    protected $guarded = ['id'];


    public function movie()
    {
        /** 
         * Parametros:
         * 1. modelo al que va dirigido
         * 2. tablar pivote
         * 3 y 4. Llaves foraneas
         * withPivot -> filas extras de la tabla pivote
         */ 
        return $this->belongsToMany(Movie::class, 'movie_screening', 'screening_id', 'movie_id')
            ->withPivot('screening_start', 'screening_finish')
            ->withTimeStamps();
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
