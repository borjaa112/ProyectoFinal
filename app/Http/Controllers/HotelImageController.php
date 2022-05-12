<?php

namespace App\Http\Controllers;

use App\Models\Hotel_image;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Runner\Hook;

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
        $hotel = Hotel::findOrFail(Auth::guard("hotel")->user()->id)->get();

        foreach ($hotel->hotel_images() as $image) {
            return $image;
        }
        return $hotel;
        $hotel = Hotel::with("hotel_direction")->get();

        foreach ($hotel->hotel_directions as $image) {
            return $image;
        }
        return $hotel;
        return view("hotel.imagenes.create");
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
    }
}
