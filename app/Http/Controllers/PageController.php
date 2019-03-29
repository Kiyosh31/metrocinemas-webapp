<?php

namespace Metrocinemas\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function info () {
        return view('info-pages.info');
    }

    public function contact () 
    {
        return view('info-pages.contact');
    }

    public function team () 
    {
        return view('info-pages.team');
    }
}
