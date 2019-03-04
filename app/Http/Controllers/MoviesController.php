<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = DB::table('movies')->get();
        //dd($movies);
        //return $movies;

        return view('pages.movie.index', compact('movies'));
    }
}
