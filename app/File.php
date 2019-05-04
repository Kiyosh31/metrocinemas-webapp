<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    /**
     * Polymorphic relationship to movies
     * One To Many
     * 
     * @return type
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
