<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        // CONSULTA CON BIBLIOTECA DB
        //$movies = DB::table('movies')->get();
        //dd($movies);
        //return $movies;

        //return view('pages.movie.index', compact('movies'));

        // CONSULTA CON MODELO
        //$movies = Movie::all();
        $movies = Movie::where('id', '!=', '1')->get();
        return view('pages.movie.index', compact('movies'));
    }
}
