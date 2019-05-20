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
        $screenings = Screening::all();
        return view('reservations.reservationForm', compact('screenings'))
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
        $request->validate([
            'user_id' => 'required|numeric',
            'screening_id' => 'required|numeric',
            'client_name' => 'required|max:255',
            'client_last_name' => 'required|max:255',
            'seats' => 'required',
        ]);

        $reservation = Reservation::create($request->except('seats'));
        
        // guarda los asientos reservados
        if($request->seats)
        {
            foreach($request->seats as $seat)
            {
                Seat_Reserved::create($seat, $reservation->id, $request->screening_id);
            }
        }

        return redirect()->route('reservations.show', $reservation->id)
        ->with([
            'notification' => 'Reservacion completada',
            'alert-class' => 'alert-success'
        ]);
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
        $screenings = Screening::all();
        return view('reservations.reservationForm', compact('reservations'), compact('screenings'))
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
