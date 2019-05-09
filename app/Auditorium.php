<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    public $table = "auditoriums";
    protected $guarded = ['id'];

    public function screening()
    {
        return $this->hasMany(Screening::class);
    }
}
