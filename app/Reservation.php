<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = ['id'];

    public function seats_reserved()
    {
        return $this->hasMany(Seat_Reserved::class);
    }

    /**
     * Get the Title first letter toUpper.
     * THIS IS AN ACCESSOR
     *
     * @return string
     */
    public function getUpperClientNameAttribute()
    {
        return ucfirst($this->client_name);
    }

    /**
     * Get the Title first letter toUpper.
     * THIS IS AN ACCESSOR
     *
     * @return string
     */
    public function getUpperClientLastNameAttribute()
    {
        return ucfirst($this->client_last_name);
    }
}
