<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Command
     * php artisan make:controller MovieController --resource --model=Movie
     * 
     * 
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.movieIndex', compact('movies'))
        ->with([
            'title' => 'Todas las peliculas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Movies.movieForm')
        ->with([
            'title' => 'Agregar Nueva Pelicula'
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
        //Validacion de datos
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:15|max:255',
            'director' => 'required|max:255',
            'cast' => 'required|max:255',
            'clasification' => 'required|max:255',
            'duration_min' => 'required|numeric'
        ]);

        // Nueva forma de guardar con el fillable o guard en el model
        Movie::create($request->all());

        return redirect()->route('movies.index')
        ->with([
            'notification' => 'Pelicula agregada con exito',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.showMovie', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //implementacion gate
        // if(\Gate::denies('edit-movie', $user))
        // {
        //     return redirect()->back()
        //         ->with(['message' => 'No tienes permiso para editar esta pelicula']);
        // }

        return view('Movies.movieForm', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:15|max:255',
            'director' => 'required|max:255',
            'cast' => 'required|max:255',
            'clasification' => 'required|max:255',
            'duration_min' => 'required|numeric'
        ]);
        
        //Nueva forma de guardar con el fillable o guard en el model
        $movie->update($request->all());

        return redirect()->route('movies.show', $movie->id)
        ->with([
            'notification' => 'Pelicula actualizada con exito',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
            ->with([
                'notification' => 'Pelicula eliminada con exito',
                'alert-class' => 'alert-danger'
            ]);
    }
}
