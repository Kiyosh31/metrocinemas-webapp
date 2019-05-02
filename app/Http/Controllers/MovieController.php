<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Movie;
use Metrocinemas\File;
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
        // se guarda movie sin los archivos
        $movie = Movie::create($request->except('files'));

        // Se guardan los archivos
        // $file = File::create([
        //     'model_id' => $movie->id,
        //     'model_type' => 'App\\Movie',
        //     'name' => $file->getOriginalName(),
        //     'hashed' => $hashedName,
        //     'mime' => $file->getClientMime(),
        //     'size' => $file->getClientSize(),
        // ]);
        // $file->save();

        return redirect()->route('movies.show', $movie->id)
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
        return view('movies.movieShow', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('Movies.movieForm', compact('movie'))
        ->with([
            'title' => 'Editar pelicula'
        ]);
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
        $movie->update($request->except('files'));

        // Se guardan los archivos
        // $file = File::create([
        //     'model_id' => $movie->id,
        //     'model_type' => 'App\\Movie',
        //     'name' => $file->getOriginalName(),
        //     'hashed' => $hashedName,
        //     'mime' => $file->getClientMime(),
        //     'size' => $file->getClientSize(),
        // ]);
        // $file->save();

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
