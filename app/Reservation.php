<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function seats_reserved()
    {
        return $this->hasMany(Seat_Reserved::class);
    }

    public function movie_screening()
    {
        return $this->hasMany(Movie_Screening::class);
    }
}
