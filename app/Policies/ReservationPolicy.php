<?php

namespace Metrocinemas\Policies;

use Metrocinemas\User;
use Metrocinemas\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reservation.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Reservation  $reservation
     * @return mixed
     */
    public function view(User $user, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can create reservations.
     *
     * @param  \Metrocinemas\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the reservation.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Reservation  $reservation
     * @return mixed
     */
    public function update(User $user, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can delete the reservation.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Reservation  $reservation
     * @return mixed
     */
    public function delete(User $user, Reservation $reservation)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the reservation.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Reservation  $reservation
     * @return mixed
     */
    public function restore(User $user, Reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the reservation.
     *
     * @param  \Metrocinemas\User  $user
     * @param  \Metrocinemas\Reservation  $reservation
     * @return mixed
     */
    public function forceDelete(User $user, Reservation $reservation)
    {
        //
    }
}
