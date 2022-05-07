<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Room_service as ControllersRoom_service;
use App\Models\Images_room;
use App\Models\ImagesRoom;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use App\Models\Room_service;
use App\Models\Room_services;
use App\Models\Service;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $servicios = Service::all();
        return view("hotel.habitacion.agregar", compact("servicios"));
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
        $room = new Room();
        $room -> hotel_id = Auth::guard('hotel')->user()->id;
        $room -> precio_noche = $request->get('precio-noche');
        $room -> camas = $request->get('camas');
        $room -> save();

        $ruta = $request->file("imagenes");
        foreach ($ruta as $imagen){
            // return dd($imagen);
            $path = Storage::putFile("room_images", $imagen);

            $imagen = new Images_room();
            $imagen -> room_id = $room -> id;
            $imagen -> img_path = $path;
            $imagen->save();
        }

        foreach ($request->input('servicios') as $servicio){
            $room->services()->attach($servicio);
        }

        //return response()->json(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        return view("hotel.habitacion.index", compact("room"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
