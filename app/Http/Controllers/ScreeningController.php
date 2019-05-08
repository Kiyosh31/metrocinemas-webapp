<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Screening;
use Metrocinemas\Movie;
use Metrocinemas\Auditorium;
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
        // Paginacion
        $screenings = Screening::paginate(10);
        return view('screenings.screeningIndex', compact('screenings'))
        ->with([
            'title' => 'Todas las proyecciones'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $auditoriums = Auditorium::all();
        return view('screenings.screeningForm', compact('movies', 'auditoriums'))
        ->with([
            'title' => 'Agregar nueva proyeccion'
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
            'movie_id' => 'required|numeric',
            'auditorium_id' => 'required|numeric',
            'screening_start' => 'required|max:255',
            'screening_finish' => 'required|max:255'
        ]);

        $screening = Screening::create($request->only('auditorium_id'));
        
        $movie = Movie::find($request->movie_id);
        $movie->screening()->attach($screening->id, ['screening_start' => $request->screening_start, 'screening_finish' => $request->screening_finish]);

        return redirect()->route('screenings.show', $screening->id)
        ->with([
            'notification' => 'Proyeccion agregada',
            'alert-class' => 'alert-success'
        ]);
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
        $auditorium = Auditorium::all();
        return view('screenings.screeningForm', compact('screening', 'movies', 'auditorium'))
        ->with([
            'title' => 'Editar una proyeccion'
        ]);
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
            'auditorium_id' => 'required|numeric',
            'start' => 'required|max:255',
            'finish' => 'required|max:255'
        ]);

        $screening->update($request->only('auditorium_id'));

        $movie = Movie::find($request->movie_id);
        $movie->screening()->sync($request->movie_id, ['screening_start' => $request->screening_start, 'screening_finish' => $request->screening_finish]);

        return redirect()->route('screenings.screeningShow', $screening->id)
        ->with([
            'notification' => 'Proyeccion eliminada',
            'alert-class' => 'alert-danger'
        ]);
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
        
        return redirect()->route('screenings.screeningIndex')
        ->with([
            'notification' => 'Proyeccion eliminada',
            'alert-class' => 'alert-danger'
        ]);
    }
}
