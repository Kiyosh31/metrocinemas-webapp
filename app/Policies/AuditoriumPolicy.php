<?php

namespace Metrocinemas\Policies;

use Metrocinemas\User;
use Metrocinemas\Auditorium;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuditoriumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the auditorium.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return mixed
     */
    public function view(User $user, Auditorium $auditorium)
    {
        //
    }

    /**
     * Determine whether the user can create auditoria.
     *
     * @param  \Metrocinemas\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the auditorium.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return mixed
     */
    public function update(User $user, Auditorium $auditorium)
    {
        //
    }

    /**
     * Determine whether the user can delete the auditorium.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return mixed
     */
    public function delete(User $user, Auditorium $auditorium)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the auditorium.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return mixed
     */
    public function restore(User $user, Auditorium $auditorium)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the auditorium.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return mixed
     */
    public function forceDelete(User $user, Auditorium $auditorium)
    {
        //
    }
}
