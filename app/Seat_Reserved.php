<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Seat_Reserved extends Model
{
    public $table = "seats_reserved";

    /**
     * Polymorphic relationship to files 1:n
     * One To Many INVERSE
     * 
     * @return type
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
