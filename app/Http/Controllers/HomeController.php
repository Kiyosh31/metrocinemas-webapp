<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Screening;
use Metrocinemas\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $screenings = Screening::all();

        return view('main-page', compact('screenings'))->with([
            'title' => 'Pagina Principal',
        ]);;
    }
}
