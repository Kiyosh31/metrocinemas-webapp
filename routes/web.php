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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Group for the routes who shares the same middleware
Route::group(['middleware' => 'auth'], function(){

    // CRUD for the management of the DB
    Route::resource('movies', 'MovieController');
    Route::resource('screenings', 'ScreeningController');
    Route::resource('auditoriums', 'AuditoriumController');
    Route::resource('reservations', 'ReservationController');

    // Load files
    Route::resource('files', 'FileController', ['except' => ['create', 'edit', 'update']]);

    // Info pages
    Route::get('/info', 'PageController@info')->name('info');
    Route::get('/contact', 'PageController@contact')->name('contact');


    // Employee pages
    Route::resource('profile', 'UserController');

    Route::get('/main-page', function () {
        return view('main-page');
    });
});