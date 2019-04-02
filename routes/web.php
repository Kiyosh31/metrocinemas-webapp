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

Route::get('/inicio', function () {
    return view('inicio');
});

//Resource for CRUD on movies
Route::resource('movies', 'MovieController');
//Resource for CRUD on screenings
Route::resource('screenings', 'ScreeningController');
//Resource for CRUD on auditoriums
Route::resource('auditoriums', 'AuditoriumController');


//Info pages
Route::get('/info', 'PageController@info')->name('info');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/team', 'PageController@team')->name('team');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
