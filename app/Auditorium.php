<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    public $table = "auditoriums";
    protected $guarded = ['id'];

    /**
     * Polymorphic relationship to screenings 1:n
     * One To Many 
     * 
     * @return type
     */
    public function screening()
    {
        return $this->hasMany(Screening::class);
    }
}
