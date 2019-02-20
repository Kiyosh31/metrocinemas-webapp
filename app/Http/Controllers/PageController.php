<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function info () {
        return view('pages.info');
    }

    public function contact () {
        return view('pages.contact');    
    }

    public function welcome () {
        return view('pages.welcome', compact('name', 'last_name'))
        ->with(['complete_name' => $name . ' ' . $last_name]);
    }
}
