<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;
class IndexController extends Controller
{
    //
    public function index(){
        $hoteles = Room::all();

        // return dd($hoteles);
        if((!Auth::user()) || Auth::user()->tipo === 0){
            return view("cliente.index", compact('hoteles'));
        }
        if(Auth::user()->tipo === 1){
            return view("hotel.index", compact('hoteles'));
        }
    }
}
