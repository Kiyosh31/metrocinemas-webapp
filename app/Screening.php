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
}
