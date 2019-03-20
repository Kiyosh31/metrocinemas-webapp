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

//Resource for CRUD on movie 
Route::resource('movies', 'MovieController');

Route::get('/info', 'PageController@info')->name('info');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/welcome/{name}/{last_name?}', 'PageController@welcome')->name('welcome');
Route::get('/team', 'PageController@team')->name('team');

Route::get('/movie', 'MoviesController@index')->name('movie.index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');