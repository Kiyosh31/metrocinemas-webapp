<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // los que si se van a insertar
    // protected $fillable = ['title', 'description', 'director', 'cast', 'clasification', 'duration_min'];

    // los que no se van a insertar
    protected $guarded = ['id'];

    public function screening()
    {
        /** 
         * Parametros:
         * 1. modelo al que va dirigido
         * 2. tablar pivote
         * 3 y 4. Llaves foraneas
         * withPivot -> filas extras de la tabla pivote
         */ 
        return $this->belongsToMany(Screening::class, 'movie_screening', 'screening_id', 'movie_id')
            ->withPivot('screening_start', 'screening_finish')
            ->withTimeStamps();
    }

    public function files()
    {
        return $this->morphMany('Metrocinemas\File', 'model');
    }
}
