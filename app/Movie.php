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
}
