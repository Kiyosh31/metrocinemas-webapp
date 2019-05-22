<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Movie;
use Metrocinemas\File;
use Illuminate\Support\Facades\Storage;
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
        // Paginacion
        $movies = Movie::paginate(10);

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
            'duration_min' => 'required|numeric',
            'photos' => 'image|mimes:jpg,jpeg,png',
        ]);

        // Nueva forma de guardar con el fillable o guard en el model
        $movie = Movie::create($request->except('photos'));

        // Si la coleccion no viene vacia
        if($request->photos)
        {
            // Recibe multiples archivos y guarda cada uno
            foreach($request->photos as $photo)
            {
                if($photo->isValid())
                {
                    // Guarda el archivo en storage/app/public/movie-covers/
                    $hashedName = $photo->store('/public/movie-covers');

                    $regFile = File::create([
                        'model_id' => $movie->id,
                        'model_type' => 'Metrocinemas\\Movie',
                        'name' => $photo->getClientOriginalName(),
                        'hashed' => $hashedName,
                        'mime' => $photo->getClientMimeType(),
                        'size' => $photo->getClientSize(),
                    ]);
                    $regFile->save();
                }
            }
        }
        
        
        return redirect()->route('movies.show', $movie->id)
        ->with([
            'notification' => 'Pelicula agregada',
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
        $photos = File::where('model_id', $movie->id)->get();
        $headers;

        foreach($photos as $photo)
        {
            $this->headers = ['Content-Type: ' . $photo->mime];
            $this->photos = Storage::download($photo->hashed, $photo->name, $this->headers);
        }

        return view('movies.movieShow', compact('movie', 'photos'))
        ->with([
            'title' => 'Ver pelicula'
        ]);
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
            'duration_min' => 'required|numeric',
            'photos' => 'image|mimes:jpg,jpeg,png',
        ]);
        
        //Nueva forma de guardar con el fillable o guard en el model
        $movie->update($request->except('photos'));

        //Si hay fotos
        if($request->photos)
        {
            // Recibe multiples archivos y guarda cada uno
            foreach($request->photos as $photo)
            {
                if($photo->isValid())
                {
                    // Guarda el archivo en storage/app/public/movie-covers/
                    $hashedName = $photo->store('/public/movie-covers');

                    $regFile = File::create([
                        'model_id' => $movie->id,
                        'model_type' => 'Metrocinemas\\Movie',
                        'name' => $photo->getClientOriginalName(),
                        'hashed' => $hashedName,
                        'mime' => $photo->getClientMimeType(),
                        'size' => $photo->getClientSize(),
                    ]);
                    $regFile->save();
                }
            }
        }
        
        return redirect()->route('movies.show', $movie->id)
        ->with([
            'notification' => 'Pelicula actualizada',
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
        // Obtiene todas las fotos de una pelicula
        $photos = File::where('model_id', $movie->id)->get();

        // Si hay fotos las elimina
        if($photos)
        {
            foreach($photos as $photo)
            {
                Storage::delete($photo->hashed);
                $photo->delete();
            }
        }

        // Despues elimina la pelicula
        $movie->delete();
        return redirect()->route('movies.index')
            ->with([
                'notification' => 'Pelicula eliminada',
                'alert-class' => 'alert-danger'
            ]);
    }

    /**
     * Add the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
     public function addPhoto(Request $request, Movie $movie)
     {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        //Si hay fotos
        if($request->photos)
        {
            // Recibe multiples archivos y guarda cada uno
            foreach($request->photos as $photo)
            {
                if($photo->isValid())
                {
                    // Guarda el archivo en storage/app/public/movie-covers/
                    $hashedName = $photo->store('/public/movie-covers');

                    $regFile = File::create([
                        'model_id' => $movie->id,
                        'model_type' => 'Metrocinemas\\Movie',
                        'name' => $photo->getClientOriginalName(),
                        'hashed' => $hashedName,
                        'mime' => $photo->getClientMimeType(),
                        'size' => $photo->getClientSize(),
                    ]);
                    $regFile->save();
                }
            }
        }
        else
        {
            return redirect()->back()
            ->with([
                'notification' => 'Debes seleccionar un archivo',
                'alert-class' => 'alert-danger'
            ]);
        }

         return redirect()->back()
            ->with([
                'notification' => 'Imagen agregada',
                'alert-class' => 'alert-success'
            ]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\File  $photo
     * @return \Illuminate\Http\Response
     */
     public function destroyImage(File $photo)
     {
         Storage::delete($photo->hashed);
         $photo->delete();

         return redirect()->back()
            ->with([
                'notification' => 'Imagen eliminado',
                'alert-class' => 'alert-success'
            ]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Movie  $movie
     * @return \Illuminate\Http\Response
     */
     public function destroyAllImages(Movie $movie)
     {
         // Obtiene todas las fotos de una pelicula
         $photos = File::where('model_id', $movie->id)->get();
 
         // Si hay fotos las elimina
         if($photos)
         {
             foreach($photos as $photo)
             {
                 Storage::delete($photo->hashed);
                 $photo->delete();
             }
         }

         return redirect()->back()
            ->with([
                'notification' => 'Todas las imagenes han sido eliminados',
                'alert-class' => 'alert-success'
            ]);
     }
}
