<?php

namespace App\Http\Controllers;

use App\Models\Hotel_direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelDirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $direccion = Hotel_direction::where("hotel_id", Auth::guard("hotel")->user()->id)->get();
        return view("hotel.cuenta.direccion.index", compact("direccion"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("hotel.cuenta.direccion.create");

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
        $direccion = new Hotel_direction();
        $direccion -> hotel_id = Auth::guard("hotel")->user()->id;
        $direccion -> calle = $request->get("calle");
        $direccion -> patio = $request->get("patio");
        $direccion -> puerta = $request->get("puerta");
        $direccion -> ciudad = $request->get("ciudad");
        $direccion -> cod_postal = $request->get("cod_postal");
        $direccion -> pais = "ES";
        $direccion -> provincia = $request->get("provincia");
        $direccion -> save();
        toast("Direccion añadida correctamente", "success");
        return redirect(route("direccion-hotel.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel_direction  $hotel_direction
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel_direction $hotel_direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel_direction  $hotel_direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel_direction $hotel_direction)
    {
        //
        return view("hotel.cuenta.direccion.edit", compact("hotel_direction"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel_direction  $hotel_direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel_direction $hotel_direction)
    {
        //
        $hotel_direction -> calle = $request->get("calle");
        $hotel_direction -> patio = $request->get("patio");
        $hotel_direction -> puerta = $request->get("puerta");
        $hotel_direction -> cod_postal = $request->get("cod_postal");
        $hotel_direction -> provincia = $request->get("provincia");
        $hotel_direction -> ciudad = $request->get("ciudad");
        $hotel_direction->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel_direction  $hotel_direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel_direction $hotel_direction)
    {
        //
    }
}
