<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = ['id'];

    /**
     * Polymorphic relationship to seats_reserved 1:n
     * One To Many
     * 
     * @return type
     */
    public function seats_reserved()
    {
        return $this->hasMany(Seat_Reserved::class);
    }

    /**
     * Polymorphic relationship to users 1:n
     * One To Many INVERSE
     * 
     * @return type
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Polymorphic relationship to movies 1:n
     * One To Many INVERSE
     * 
     * @return type
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
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
