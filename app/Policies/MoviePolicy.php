<?php

namespace Metrocinemas\Policies;

use Metrocinemas\User;
use Metrocinemas\Movie;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the movie.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Movie  $movie
     * @return mixed
     */
    public function view(User $user, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can create movies.
     *
     * @param  \Metrocinemas\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the movie.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Movie  $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the movie.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Movie  $movie
     * @return mixed
     */
    public function delete(User $user, Movie $movie)
    {
        
    }

    /**
     * Determine whether the user can restore the movie.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Movie  $movie
     * @return mixed
     */
    public function restore(User $user, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the movie.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Movie  $movie
     * @return mixed
     */
    public function forceDelete(User $user, Movie $movie)
    {
        //
    }
}
