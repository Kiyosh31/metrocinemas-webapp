<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Screening;
use Metrocinemas\Movie;
use Metrocinemas\Room;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screenings = Screening::where('active', '=', '1')->get();
        return view('screenings.screeningIndex', compact('screenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::where('active', '=', '1')->get();
        $rooms = Room::where('active', '=', '1')->get();
        return view('screenings.screeningForm', compact('movies', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $screening = new Screening();
        $screening->movie_id = $request->movie_id;
        $screening->room_id = $request->room_id;
        $screening->start = $request->start;
        $screening->finish = $request->finish;
        $screening->active = $request->active;
        $screening->save();

        return redirect()->route('screenings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\Screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function show(Screening $screening)
    {
        return view('screenings.screeningShow', compact('screening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function edit(Screening $screening)
    {
        $movies = Movie::where('active', '=', '1')->get();
        $rooms = Room::where('active', '=', '1')->get();
        return view('screenings.screeningForm', compact('screening', 'movies', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screening $screening)
    {
        $screening->movie_id = $request->movie_id;
        $screening->room_id = $request->room_id;
        $screening->start = $request->start;
        $screening->finish = $request->finish;
        $screening->active = $request->active;
        $screening.save();

        return redirect()->route('screenings.screeningShow', $screening-id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screening $screening)
    {
        $screening->delete();
        return redirect()->route('screenings.screeningIndex');
    }
}
