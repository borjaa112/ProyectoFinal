<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Auth::user();
        if(Auth::guard("hotel")->check()){
            $user = Auth::guard("hotel")->user();
            return view("hotel.cuenta.perfil", compact("user"));
        }
        if(Auth::guard("client")->check()){
            return view("cliente.cuenta.perfil");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::guard("hotel")->check()){
            $hotel = Hotel::findOrfail($id);
            $hotel -> nombre = $request->nombre;
            $hotel -> descripcion = $request->descripcion;
            $hotel -> email = $request->email;

            if($request->current_password){
                if(!(Hash::check($request->current_password, Auth::guard("hotel")->user()->password))){
                    toast('La contraseña actual no es correcta','error');
                    return redirect(route("cuenta.index"));
                }
                if(strcmp($request->current_password, $request->password) == 0){
                    // Current password and new password same
                    toast('La contraseña nueva es la misma que la actual','error');
                    return redirect(route("cuenta.index"));

                }
                if(!strcmp($request->password, $request->password_confirm) == 0){
                    toast('Las contraseñas no coinciden','error');
                    return redirect(route("cuenta.index"));
                }

            }
            if($request->hasFile("imagen")){
                if($request->file('imagen')->isValid()){
                    //borrar la imagen anterior
                    // $ruta = str_replace("/imgs/", "",$hotel->img_path);
                    // Storage::delete($ruta);

                    //subir la nueva imagen del usuario
                    $path = Storage::putFile("profile_imgs", $request->file("imagen"));
                    //asignar nueva imagen
                    $hotel->img_path = "/imgs/".$path;
                }
            }

            $hotel->save();
        }
        toast('Datos actualizados correctamente','success');
        return redirect(route("cuenta.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
