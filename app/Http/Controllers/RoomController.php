<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.roomIndex', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.roomForm');
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
            'name' => 'required|max:45'
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.roomShow', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.roomForm', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|max:45'
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.show', $room->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
