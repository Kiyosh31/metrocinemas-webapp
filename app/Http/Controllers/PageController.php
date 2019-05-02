<?php

namespace Metrocinemas\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function info () {
        return view('info-pages.info')
        ->with([
            'title' => 'Informacion'
        ]);
    }

    public function contact () 
    {
        return view('info-pages.contact')
        ->with([
            'title' => 'Contacto'
        ]);
    }
}
