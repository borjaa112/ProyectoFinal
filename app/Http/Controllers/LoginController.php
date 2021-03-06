<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\User;
use App\Models\Client;
use App\Models\Hotel;
use App\Models\Pension;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function registroForm()
    {
        return view("auth.registro");
    }

    public function registro(RegistroRequest $request)
    {
        //registro para hotel
        if ($request->typeUser === "hotel") {
            $user = Hotel::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'descripcion' => $request->descripcion,
                'cif' => $request->dni,
                'password' => Hash::make($request->password),
                'img_path' => "imgs/profile_imgs/hotel-default.png"

            ]);
            Auth::guard("hotel")->login($user);
            return redirect(route("direccion-hotel.create"));
        }
        //registro para cliente
        if ($request->typeUser === "cliente") {
            $user = Client::create([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'nif' => $request->dni,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_path' => "imgs/profile_imgs/user-default.png"

            ]);
            Auth::guard("client")->login($user);
        }

        // if($request->typeUser === "admin"){
        //     $admin = User::create([
        //         'nombre' => $request->nombre,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password)
        //     ]);
        //     Auth::login($admin);
        // }


        return redirect('/');
    }

    public function loginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // if(Auth::attempt($credenciales)){

        //     return redirect(route('inicio'));
        // }
        if (Auth::guard('hotel')->attempt($credenciales)) {
            // return Auth::user();
            // return dd(Auth::guard('hotel')->user());
            return redirect(route('inicio'));
        } else if (Auth::guard('client')->attempt($credenciales)) {
            return redirect(route('inicio'));
        } else {
            return redirect(route("login"))->with("error", "las credenciales introducidas son incorrectas");
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('hotel')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }
}
