<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class MovieScreening extends Model
{
    protected $dates = ['screening_start', 'screening_start', 'created_at', 'updated_at'];

    public function getDateScreeningStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getDateScreeningFinishAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
