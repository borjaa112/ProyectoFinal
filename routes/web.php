<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ClientDirectionController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelDirectionController;
use App\Http\Controllers\HotelImageController;
use App\Http\Controllers\ImagesRoomController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Models\Hotel_direction;
use App\Models\Hotel_image;
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

Route::get("/direccion", function(){
    if(Auth::guard("hotel")->check()){
        return redirect(route("direccion-hotel.index"));
    }
    if(Auth::guard("client")->check()){
        return redirect(route("direccion-cliente.index"));
    }
    else{
        return redirect(route("inicio"));
    }
});

Route::resource("/direccion-hotel", HotelDirectionController::class)->parameters(["direccion-hotel" => "hotel_direction"])->middleware("auth:hotel");
Route::resource("/direccion-cliente", ClientDirectionController::class)->parameters(["direccion-cliente" => "client_direction"])->middleware("auth:client");



Route::get("/search", [RoomController::class, "buscar"])->name("buscar");
Route::resource("/habitacion", RoomController::class)->only(["create", "store", "edit", "update", "destroy"])->parameters(['habitacion' => 'room'])->middleware("auth:hotel");
Route::resource("/habitacion", RoomController::class)->only(["index", "show", "buscar"])->parameters(['habitacion' => 'room']);


Route::resource("/hotel", HotelController::class);

Route::resource("/instalaciones", HotelImageController::class)->parameters(["instalaciones" => "hotel_image"])->middleware("auth:hotel");
Route::get("/test", function(){
    return Auth::user();

});

Route::resource("/roomimage", ImagesRoomController::class)->parameters(["roomimage" => "images_room"]);

Route::resource("/reservar", BooksController::class)->middleware("auth:client");


Route::resource("/fill", ServiceController::class);

