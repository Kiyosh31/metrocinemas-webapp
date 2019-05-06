<?php

namespace Metrocinemas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    // los que si se van a insertar
    // protected $fillable = ['title', 'description', 'director', 'cast', 'clasification', 'duration_min'];

    // los que no se van a insertar
    protected $guarded = ['id'];

    // Implementa soft deletes -> clase con metodos
    use SoftDeletes;

    /**
     * Polymorphic relationship to screening
     * Many To Many
     * @return type
     */
    public function screening()
    {
        /** 
         * Parametros:
         * 1. modelo al que va dirigido
         * 2. tablar pivote
         * 3 y 4. Llaves foraneas
         * withPivot -> filas extras de la tabla pivote
         */ 
        return $this->belongsToMany(Screening::class, 'movie_screening', 'screening_id', 'movie_id')
            ->withPivot('screening_start', 'screening_finish')
            ->withTimeStamps();
    }

    /**
     * Polymorphic relationship to files
     * One To Many
     * 
     * @return type
     */
    public function files()
    {
        return $this->morphMany('Metrocinemas\File', 'modelo');
    }

    /**
     * Get the title first letter toUpper.
     *
     * @return string
     */
    public function getUpperTitleAttribute()
    {
        return ucfirst($this->title);
    }

    /**
     * Get the description first letter toUpper.
     *
     * @return string
     */
    public function getUpperDescriptionAttribute()
    {
        return ucfirst($this->description);
    }

    /**
     * Get the Directors first letter toUpper.
     *
     * @return string
     */
    public function getUpperDirectorAttribute()
    {
        return ucfirst($this->director);
    }

    /**
     * Get the casts first letter toUpper.
     *
     * @return string
     */
    public function getUpperCastAttribute()
    {
        return ucfirst($this->cast);
    }

    /**
     * Set the category uppercase
     *
     * @param  string  $value
     * @return void
     */
    public function setClasificationAttribute($clasification)
    {
        $this->attributes['clasification'] = strtoupper($clasification);
    }
}
