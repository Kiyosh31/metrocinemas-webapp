<?php

namespace Metrocinemas\Policies;

use Metrocinemas\User;
use Metrocinemas\Screening;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScreeningPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the screening.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Screening  $screening
     * @return mixed
     */
    public function view(User $user, Screening $screening)
    {
        //
    }

    /**
     * Determine whether the user can create screenings.
     *
     * @param  \Metrocinemas\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the screening.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Screening  $screening
     * @return mixed
     */
    public function update(User $user, Screening $screening)
    {
        //
    }

    /**
     * Determine whether the user can delete the screening.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Screening  $screening
     * @return mixed
     */
    public function delete(User $user, Screening $screening)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the screening.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Screening  $screening
     * @return mixed
     */
    public function restore(User $user, Screening $screening)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the screening.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Screening  $screening
     * @return mixed
     */
    public function forceDelete(User $user, Screening $screening)
    {
        //
    }
}
