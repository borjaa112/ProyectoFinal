<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;

class IndexController extends Controller
{
    //
    public function index(){
        $habitaciones = Room::all();

        // return dd($hoteles);
        // return dd(Auth::guard('hotel')->check());
        if(Auth::guard('hotel')->check()){
            // return dd(Auth::guard("hotel")->user());
            return view("hotel.index", compact("habitaciones"));
        }
        if(Auth::guard('client')->check() || !Auth::user()){
            return view("cliente.index", compact("habitaciones"));
        }
        // if(Auth::user()->tipo === 1){
        //     return view("hotel.index", compact('hoteles'));
        // }

    }
}
