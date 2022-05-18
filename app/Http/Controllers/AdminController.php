<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function registroForm(){
        return view("auth.admin.registro");
    }

    public function registro(Request $request){
        $admin = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($admin);
    }

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
}
