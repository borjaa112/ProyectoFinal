<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function loginForm(){
        return view("auth.admin.login");
    }

    public function login(Request $request){
        $credenciales = $request->only("email", "password");
        if(Auth::attempt($credenciales)){
            return redirect(route("inicio"));
        }
        else{
            return back()->with("error", "las credenciales introducidas no son correctas");
        }
    }

    public function dashboard(){
        return  view("admin.dashboard");
    }

    public function administrar_usuarios(){
        $clientes = Client::get();
        return view("admin.usuarios.index", compact("clientes"));
    }

    public function administrar_hoteles(){
        $hoteles = Hotel::get();
        return view("admin.hoteles.index", compact("hoteles"));
    }

    public function administrar_habitaciones(){
        $habitaciones = Room::get();
        return view("admin.habitaciones.index", compact("habitaciones"));
    }

    public function ver_reservas(){
        $clientes = Client::get();
        // return $reservas;
        return view("admin.reservas.index", compact("clientes"));
    }
}
