<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    return view('pages.info');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/welcome/{name}/{last_name?}', function ($name, $last_name = null) {
    //return $name . ' ' . $last_name;
    return view('pages.welcome')
        ->with(['name' => $name, 'last_name' => $last_name]);
});