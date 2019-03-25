<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    public function movie()
    {
        return $this->belongsTo('Movie');
    }
}
