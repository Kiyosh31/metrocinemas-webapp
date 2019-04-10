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
        return $this->belongsTo(Movie::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function screening_has_movies()
    {
        // Parametros:
        // 1. Modelo
        // 2. Tabla pivote
        // 3. FK screening_id de la tabla pivote
        return $this->belongsToMany(Screening_has_movie::class, 'screenings_has_movies', 'screenings_id');
    }
}
