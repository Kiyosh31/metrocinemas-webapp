<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class MovieScreening extends Model
{
    protected $dates = ['screening_start', 'screening_finish', 'created_at', 'updated_at'];


}
