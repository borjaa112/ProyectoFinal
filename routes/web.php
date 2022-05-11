<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HotelDirectionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Models\Hotel_direction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [IndexController::class, 'index'])->name("inicio");

Route::get('/registro', [LoginController::class, 'registroForm'])->name('registro');
Route::post('/registro', [LoginController::class, 'registro']);

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::middleware(["auth:hotel", "auth:client"])->post("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/home", function(){
    return redirect('/');
});

Route::resource("/cuenta", AccountController::class);
Route::resource("/direccion", HotelDirectionController::class)->parameters(["direccion" => "hotel_direction"]);

Route::get("/search", [RoomController::class, "buscar"])->name("buscar");
Route::resource("/habitacion", RoomController::class)->only(["create", "store", "edit"])->parameters(['habitacion' => 'room'])->middleware("auth:hotel");
Route::resource("/habitacion", RoomController::class)->only(["index", "show", "buscar"])->parameters(['habitacion' => 'room']);

Route::get("/test", function(){
    return Auth::user();

});

Route::resource("/fill", ServiceController::class);

