<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Reservation;
use Metrocinemas\Screening;
use Metrocinemas\Seat_Reserved;
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
        $screenings = Screening::all();

        return view('reservations.reservationIndex', compact('reservations', 'screenings', 'seats'))
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
            'screening_id' => 'required',
            'client_name' => 'required|max:255',
            'client_last_name' => 'required|max:255',
            'seats' => 'required',
            'total_buy' => 'required|numeric',
        ]);

        // separa el screening_id del movie_id
        $data = explode('|', $request->screening_id);

        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->screening_id = $data[0];
        $reservation->movie_id = $data[1];
        $reservation->client_name = $request->client_name;
        $reservation->client_last_name = $request->client_last_name;
        $reservation->paid = $request->total_buy;
        $reservation->save();

        foreach($request->seats as $seat)
        {
            $newSeat = new Seat_Reserved();
            $newSeat->seat = $seat;
            $newSeat->reservation_id = $reservation->id;
            $newSeat->screening_id = $data[0];
            $newSeat->save();
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
        $seats_reserved = Seat_Reserved::where('reservation_id', $reservation->id)->get();
        $imploded = $seats_reserved->implode('seat', ',');

        return view('reservations.reservationShow', compact('reservation', 'imploded'));
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

        return view('reservations.reservationForm', compact('reservation', 'screenings'))
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
        $request->validate([
            'user_id' => 'required|numeric',
            'screening_id' => 'required',
            'client_name' => 'required|max:255',
            'client_last_name' => 'required|max:255',
            'seats' => 'required',
            'total_buy' => 'required|numeric',
        ]);

        // separa el screening_id del movie_id
        $data = explode('|', $request->screening_id);

        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->screening_id = $data[0];
        $reservation->movie_id = $data[1];
        $reservation->client_name = $request->client_name;
        $reservation->client_last_name = $request->client_last_name;
        $reservation->paid = $request->total_buy;
        $reservation->save();

        foreach($request->seats as $seat)
        {
            $newSeat = new Seat_Reserved();
            $newSeat->seat = $seat;
            $newSeat->reservation_id = $reservation->id;
            $newSeat->screening_id = $data[0];
            $newSeat->save();
        }

        return redirect()->route('reservations.show', $reservation->id)
        ->with([
            'notification' => 'Reservacion actualizada',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')
            ->with([
                'notification' => 'Reservacion eliminada',
                'alert-class' => 'alert-danger'
            ]);
    }
}
