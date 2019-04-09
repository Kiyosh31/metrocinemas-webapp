<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Auditorium;
use Illuminate\Http\Request;

class AuditoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditoriums = Auditorium::all();
        return view('auditoriums.auditoriumIndex', compact('auditoriums'))
        ->with([
            'title' => 'Todos los auditorios'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auditoriums.auditoriumForm')
        ->with([
            'title' => 'Agregar auditorios'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion de datos
        $request->validate([
            'name' => 'required|max:255',
            'seats_no' => 'required|integer'
        ]);

        Auditorium::create($request->all());

        return redirect()->route('auditoriums.index')
        ->with([
            'notification' => 'Auditorio agregado con exito',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function show(Auditorium $auditorium)
    {
        return view('auditoriums.auditoriumShow', compact('auditorium'))
        ->with([
            'title' => 'Todas los auditorios'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditorium $auditorium)
    {
        return view('auditoriums.auditoriumForm', compact('auditorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditorium $auditorium)
    {
        $request->validate([
            'name' => 'required|max:255',
            'seats_no' => 'required|integer'
        ]);

        $auditorium->update($request->all());

        return redirect()->route('auditoriums.show', $auditorium->id)
        ->with([
            'notification' => 'Auditorio actualizado con exito',
            'alert-class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditorium $auditorium)
    {
        $auditorium->delete();
        return redirect()->route('auditoriums.index')
        ->with([
            'notification' => 'Auditorio eliminado con exito',
            'alert-class' => 'alert-danger'
        ]);
    }
}
