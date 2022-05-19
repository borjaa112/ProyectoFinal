<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ClientController;
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

Route::get("/admin/registro", [AdminController::class, "registroForm"]);
Route::post("/admin/registro", [AdminController::class, "registro"])->name("admin-registro");

Route::get("/admin/login", [AdminController::class, 'loginForm']);
Route::post("/admin/login", [AdminController::class, 'login'])->name("admin-login");

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
Route::resource("/habitacion", RoomController::class)->only(["index", "show", "buscar"])->parameters(['habitacion' => 'room']);
Route::resource("/habitacion", RoomController::class)->only(["create", "store", "edit", "update", "destroy"])->parameters(['habitacion' => 'room'])->middleware(["auth:hotel,web"]);


Route::resource("/hotel", HotelController::class);

Route::resource("/instalaciones", HotelImageController::class)->parameters(["instalaciones" => "hotel_image"])->middleware("auth:hotel");
Route::get("/test", function(){
    return Auth::user();

});

Route::resource("/roomimage", ImagesRoomController::class)->parameters(["roomimage" => "images_room"]);

Route::resource("/reservar", BooksController::class)->middleware("auth:client");


Route::resource("/fill", ServiceController::class);

// Route::group(["middleware" => ["auth:client"]], function(){
//     Route::get("/middle", function(){
//         return "hola";
//     });
// });

// Route::get("/middle", function(){
//     return "hola";
// })->middleware("auth:client,hotel");

Route::resource("/cliente", ClientController::class)->only(("destroy"))->parameters(["cliente" => "client"]);
Route::group(["middleware" => ["auth:web"]], function(){
    Route::get("/admin/dashboard", [AdminController::class, "dashboard"])->name("dashboard");
    Route::get("/admin/usuarios", [AdminController::class, "administrar_usuarios"])->name("administrar_usuarios");
    Route::get("/admin/hoteles", [AdminController::class, "administrar_hoteles"])->name("administrar_hoteles");
    Route::get("/admin/habitaciones", [AdminController::class, "administrar_habitaciones"])->name("administrar_habitaciones");
    Route::get("/admin/reservas", [AdminController::class, "ver_reservas"])->name("ver_reservas");
});
