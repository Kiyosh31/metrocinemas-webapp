<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile')
        ->with([
            'title' => 'Perfil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * upgrade the user from employee to administrator or viveversa.
     *
     * @param  \Metrocinemas\User  $user
     * @return \Illuminate\Http\Response
     */
     public function promoteUser(User $user)
     {
         
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'max:255',
            'email' => 'max:255',
            'password' => 'max:255',
            'password_confirmation' => 'max:255'
        ]);

        //hashear la password
        if($request->password == $request->password_confirmation)
        {
            
        }

        return redirect()->route('profile.index')
        ->with([
            'notification' => 'Datos actualizados con exito',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
