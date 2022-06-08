<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientDirectionRequest;
use App\Models\Client_direction;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientDirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $direccion = Client_direction::where("client_id", Auth::guard("client")->user()->id)->first();
        $client = Client::where("id", Auth::guard("client")->user()->id)->first();
        if(is_null($client->client_direction)){
            return redirect(route("direccion-cliente.create"));
        }

        return view("cliente.direccion.index", compact("client"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("cliente.direccion.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientDirectionRequest $request)
    {
        //
        $direccion = new Client_direction();
        $direccion -> client_id = Auth::guard("client")->user()->id;
        $direccion -> calle = $request->get("calle");
        $direccion -> patio = $request->get("patio");
        $direccion -> puerta = $request->get("puerta");
        $direccion -> ciudad = $request->get("ciudad");
        $direccion -> cod_postal = $request->get("cod_postal");
        $direccion -> pais = "ES";
        $direccion -> provincia = $request->get("provincia");
        $direccion -> save();
        toast("Direccion añadida correctamente", "success");
        return redirect(route("direccion-cliente.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client_direction  $client_direction
     * @return \Illuminate\Http\Response
     */
    public function show(Client_direction $client_direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client_direction  $client_direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Client_direction $client_direction)
    {
        //
        return view("cliente.direccion.edit", compact("client_direction"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client_direction  $client_direction
     * @return \Illuminate\Http\Response
     */
    public function update(ClientDirectionRequest $request, Client_direction $client_direction)
    {
        //
        $client_direction -> calle = $request->get("calle");
        $client_direction -> patio = $request->get("patio");
        $client_direction -> puerta = $request->get("puerta");
        $client_direction -> cod_postal = $request->get("cod_postal");
        $client_direction -> provincia = $request->get("provincia");
        $client_direction -> ciudad = $request->get("ciudad");
        $client_direction->save();
        return back()->with("info", "Dirección actualizada con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client_direction  $client_direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client_direction $client_direction)
    {
        //
    }
}
