<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        if((!Auth::user()) || Auth::user()->tipo === 0){
            return view("cliente.index");
        }
        if(Auth::user()->tipo === 1){
            return view("hotel.index");
        }
    }
}
