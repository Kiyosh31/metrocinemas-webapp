<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Reservation;
use Metrocinemas\User;
use Metrocinemas\Screening;
use Metrocinemas\Movie;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.reservationIndex', compact('reservations'))
        ->with([
            'title' => 'Todas las reservaciones'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $screenings = Screening::all();
        $movies = Movie::all();
        return view('reservations.reservationForm', compact('users', 'screenings', 'movies'))
        ->with([
            'title' => 'Agregar Nueva reservacion'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.reservationShow', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $screenings = Screening::all();
        $movies = Movie::all();
        return view('reservations.reservationForm', compact('reservations'), compact('users', 'screenings', 'movies'))
        ->with([
            'title' => 'Editar una reservacion'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
