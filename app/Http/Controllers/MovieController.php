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
        return view('movies.movieIndex', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Movies.movieForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtenemos la info enviada desde el form
        //dd($request->all());
        

        //Validacion de datos
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:15|max:255',
            'director' => 'required|max:255',
            'cast' => 'required|max:255',
            'clasification' => 'required|max:1',
            'duration_min' => 'required|numeric'
        ]);

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->cast = $request->cast;
        $movie->clasification = $request->clasification;
        $movie->duration_min = $request->duration_min;
        $movie->active = $request->status;
        $movie->save();

        return redirect()->route('movies.index');
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
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->cast = $request->cast;
        $movie->clasification = $request->clasification;
        $movie->duration_min = $request->duration_min;
        $movie->active = $request->status;
        $movie->save();

        return redirect()->route('movies.show', $movie->id);
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
        return redirect()->route('movies.index');
    }
}
