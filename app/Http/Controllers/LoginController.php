<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function registroForm(){
        return view("auth.registro");
    }

    public function registro(RegistroRequest $request){
        //registro para hotel
        if($request->typeUser === "hotel"){
            $user = User::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'descripcion' => $request->descripcion,
                'password' => Hash::make($request->password),
                'tipo' => 1
            ]);
        }
        //registro para cliente
        if($request->typeUser === "cliente"){
            $user = User::create([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tipo' => 0
            ]);
        }

        Auth::login($user);

        return redirect('cuenta');
    }

    public function loginForm(){
        return view("auth.login");
    }

    public function login(Request $request){
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credenciales)){

            return redirect('cuenta');
        }else{
            return "error";
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
