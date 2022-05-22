<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
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
    public function create(Request $request)
    {
        //
        $habitacion = Room::findOrFail($request->habitacion);
        $fecha_entrada = $request->fecha_entrada;
        $noches = $request->fecha_salida;

        $fecha_salida = Carbon::createFromFormat('Y-m-d', $fecha_entrada);
        $fecha_salida = $fecha_salida->addDays($noches);
        $fecha_salida = $fecha_salida->format("d-m-Y");

        // $noches = $noches-1;

        return view("reservas.pago", compact("habitacion", "fecha_entrada", "fecha_salida", "noches"));
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
        $client = Client::findOrFail(Auth::guard("client")->user()->id);
        $client->rooms()->attach($request->get("room_id"), ["precio" => $request->get("precio_form"), "tipo_pension" => $request->get("pension_form"), "fecha_entrada" => $request->get("fecha_entrada_form"),"fecha_salida" => Carbon::parse($request->get("fecha_salida_form"))->format("Y/m/d"), "num_noches" => $request->get("noches_form")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("client_room")->where("id", $id)->delete();

    }
}
