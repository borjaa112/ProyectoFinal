<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Hotel_image;
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
        $hotel = Hotel::findOrFail(Auth::guard("hotel")->user()->id)->with("hotel_images")->get();
        return $hotel;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotel_image = new Hotel_image();
        $hotel_image -> hotel_id = Auth::guard("hotel")->user()->id;
        $hotel_image -> img_path = "jasjasdajksda.png";
        $hotel_image->save();
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
