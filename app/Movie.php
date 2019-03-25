<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function Screening()
    {
        return $this->hasMany(Screening::class);
    }
}
