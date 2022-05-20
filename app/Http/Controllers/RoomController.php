<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Room_service as ControllersRoom_service;
use App\Models\Images_room;
use App\Models\Hotel;
use App\Models\Hotel_direction;
use App\Models\ImagesRoom;
use App\Http\Requests\createRoomRequest;
use App\Http\Requests\searchRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use App\Models\Room_service;
use App\Models\Room_services;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth:hotel,web"], ["except" => [
            "index", "show", "buscar"
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $direccion = Hotel_direction::where("hotel_id", Auth::guard("hotel")->user()->id)->first();
        if (is_null($direccion)) {
            toast("Antes de crear una habitación es necesario que establezca su dirección", "error");
            return redirect(route("direccion-hotel.create"));
        }
        $servicios = Service::all();
        return view("hotel.habitacion.agregar", compact("servicios"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRoomRequest $request)
    {
        //
        $room = new Room();
        $room->hotel_id = Auth::guard('hotel')->user()->id;
        $room->precio_noche = $request->get('precio-noche');
        $room->precio_mp = $request->get("MP");
        $room->precio_pc = $request->get("PC");
        $room->precio_hd = $request->get("HD");
        $room->camas = $request->get('camas');
        $room->save();

        $ruta = $request->file("imagenes");
        // $request->validate([
        //     'imagenes' => 'required',
        //     'imagenes.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
        //   ]);
        foreach ($ruta as $imagen) {
            // return dd($imagen);
            $path = Storage::putFile("room_images", $imagen);

            $imagen = new Images_room();
            $imagen->room_id = $room->id;
            $imagen->img_path = $path;
            $imagen->save();
        }

        foreach ($request->input('servicios') as $servicio) {
            $room->services()->attach($servicio);
        }

        toast("Habitación creada con éxito", "success");
        return redirect(route("habitacion.show", $room));

        //return response()->json(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //

        return view("hotel.habitacion.index", compact("room"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        $servicios = Service::all();
        return view("hotel.habitacion.edit", compact("room", "servicios"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        $room->precio_noche = $request->get("precio-noche");
        $room->camas = $request->get("camas");

        //esto borra todos los servicios
        foreach (Service::get() as $servicio) {
            $room->services()->detach($servicio);
        }

        //los vuelve a asignar
        foreach ($request->input('servicios') as $servicio) {
            $room->services()->attach($servicio);
        }

        $room->precio_mp = $request->get("MP");
        $room->precio_pc = $request->get("PC");
        $room->precio_hd = $request->get("HD");

        $room->save();

        //parte de la img


        $ruta = $request->file("imagenes");
        if ($ruta !== null) {
            foreach ($ruta as $imagen) {
                // return dd($imagen);
                $path = Storage::putFile("room_images", $imagen);

                $imagen = new Images_room();
                $imagen->room_id = $room->id;
                $imagen->img_path = $path;
                $imagen->save();
            }
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return back();
    }

    public function buscar(searchRequest $request)
    {
        // return $request;
        $noches = $request->fecha_salida;
        $fecha_salida = Carbon::createFromFormat('Y-m-d', $request->fecha_entrada);
        $fecha_salida = $fecha_salida->addDays($noches);
        // return $fecha_salida;
        $habitaciones = Room::get();
        $rooms = array();
        foreach ($habitaciones as $habitacion) {
            $valida = count($habitacion->clients);

            // return $habitacion->clients;
            if($habitacion->clients->isEmpty()){
                $rooms[] = $habitacion;
                continue;
            }
            foreach($habitacion->clients as $client_room){
                // return $habitacion->clients;
                //$client_room->pivot->fecha_entrada
                if($request->fecha_entrada >= $client_room->pivot->fecha_entrada && $fecha_salida < $client_room->pivot->fecha_salida){
                    $valida -= 1;
                }
                if(Carbon::createFromFormat("Y-m-d", $client_room->pivot->fecha_entrada)->between(Carbon::createFromFormat("Y-m-d",$request->fecha_entrada), $fecha_salida)){
                    // return $client_room->pivot->fecha_entrada." - - -".$request->fecha_entrada."---".$fecha_salida;
                    $valida -= 1;
                }

                // if($valida == count($habitacion->clients)){

                //     $rooms[] = $habitacion;
                // }
                // return $client_room->pivot;
            }
            // return $rooms;
            if($valida == count($habitacion->clients)){

                $rooms[] = $habitacion;
            }
        }

        // ------------------------------
        // $hoteles = Hotel::whereRelation("hotel_directions", "ciudad", $request->get("input_ciudad"))->get();
        // return $hoteles;
        return view("cliente.busqueda.index", compact("request", "rooms"));
    }
}
