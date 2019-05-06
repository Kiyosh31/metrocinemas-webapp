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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// Group for the routes who shares the same middleware
Route::group(['middleware' => 'auth', 'verified'], function(){

    // CRUD for the management of the DB
    Route::resource('user', 'UserController');
    Route::resource('movies', 'MovieController');
    Route::resource('screenings', 'ScreeningController');
    Route::resource('auditoriums', 'AuditoriumController');
    Route::resource('reservations', 'ReservationController');

    // Delete a movie file
    Route::delete('movies/delete-image/{photo}', 'MovieController@destroyImage');
    // Delete all movie files
    Route::delete('movies/delete-images/{movie}', 'MovieController@destroyAllImages');

    // CRUD files
    Route::resource('files', 'FileController', ['except' => ['create', 'edit', 'update']]);

    // Send verification emails
    // Route::get('emails/users-list', 'VerifyUserController@usersList')->name('users-not-verified');
    // Route::get('emails/send-email/{user}', 'VerifyUserController@sendMail');

    // Info pages
    Route::get('/info', 'PageController@info')->name('info');
    Route::get('/contact', 'PageController@contact')->name('contact');

    Route::get('/main-page', function () {
        return view('main-page');
    });
});