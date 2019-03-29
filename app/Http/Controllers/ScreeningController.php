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
        $screenings = Screening::all();
        return view('screenings.screeningIndex', compact('screenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
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
        $request->validate([
            'movie_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'start' => 'required|max:255',
            'finish' => 'required|max:255'
        ]);

        Screening::create($request->all());

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
        $movies = Movie::all();
        $rooms = Room::all();
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
        $request->validate([
            'movie_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'start' => 'required|max:255',
            'finish' => 'required|max:255'
        ]);

        $screening->update($request->all());

        return redirect()->route('screenings.screeningShow', $screening->id);
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
