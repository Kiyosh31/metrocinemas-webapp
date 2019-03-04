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

Route::get('/info', 'PageController@info');
Route::get('/contact', 'PageController@contact');
Route::get('/welcome/{name}/{last_name?}', 'PageController@welcome');
Route::get('/team', 'PageController@team')->name('team');

Route::get('/movies', 'MoviesController@index')->main('movies.index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
