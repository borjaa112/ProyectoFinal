<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Hotel_image;
use Illuminate\Support\Facades\Storage;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotel = Hotel::findOrFail(Auth::guard("hotel")->user()->id);
        return view("hotel.imagenes.create", compact("hotel"));
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

        $ruta = $request->file("imagenes");
        foreach ($ruta as $imagen) {
            $hotel_image = new Hotel_image();

            $path = Storage::putFile("room_images", $imagen);

            $hotel_image->hotel_id = Auth::guard("hotel")->user()->id;
            $hotel_image->img_path = $path;
            $hotel_image->save();
        }
        return redirect(route("instalaciones.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel_image  $hotel_image
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel_image $hotel_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel_image  $hotel_image
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel_image $hotel_image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel_image  $hotel_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel_image $hotel_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel_image  $hotel_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel_image $hotel_image)
    {
        //
        $hotel_image->delete();
        return redirect(route("instalaciones.index"));

    }
}
