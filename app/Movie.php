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
        return $this->hasMany(Screening::class);
    }

    public function screening_has_movies()
    {
        // Parametros:
        // 1. Modelo
        // 2. Tabla pivote
        // 3. FK id_movie de la tabla pivote
        return $this->belongsToMany(screening_has_movies::class, 'screenings_has_movies', 'movies_id');
    }
}
