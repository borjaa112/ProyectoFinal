<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
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

Route::resource('/crearhabitacion', RoomController::class);

Route::get("/test", function(){
    return Auth::user();

});

Route::resource("/fill", ServiceController::class);
