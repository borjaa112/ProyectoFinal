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
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;

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
        $hotel = Hotel::findOrFail(Auth::guard("hotel")->user()->id);
        if($hotel->precio_mp == 0 && $hotel->precio_pc == 0 && $hotel->precio_hd == 0){
            toast("Tu hotel todavía no tiene configurado el precio de las distintas pensiones, mientras no esté configurado los clientes no podrán reservar con ninguna pensión", "info");
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

        if ($request->input("servicios")) {
            foreach ($request->input('servicios') as $servicio) {
                $room->services()->attach($servicio);
            }
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
        // $noches = $request->fecha_salida;
        // $mi_fecha_salida = Carbon::createFromFormat('Y-m-d', $request->fecha_entrada);
        // $mi_fecha_salida = $mi_fecha_salida->addDays($noches);
        $mi_fecha_salida = $request->fecha_salida;

        $mi_fecha_entrada = Carbon::createFromFormat("Y-m-d", $request->fecha_entrada);
        $hoteles = Hotel::with("rooms")->whereRelation("hotel_directions", "ciudad", $request->get("input_ciudad"))->get();

        $rooms = array();

        foreach ($hoteles as $hotel) {
            foreach ($hotel->rooms as $habitacion) {
                $valida = count($habitacion->clients);
                if ($habitacion->clients->isEmpty()) {
                    $rooms[] = $habitacion;
                    continue;
                }
                foreach ($habitacion->clients as $client_room) {
                    $res_fecha_entrada = Carbon::createFromFormat('Y-m-d', $client_room->pivot->fecha_entrada);
                    $res_fecha_salida = Carbon::createFromFormat('Y-m-d', $client_room->pivot->fecha_salida);

                    /*inicio de validaciones*/

                    if ($res_fecha_entrada->betweenExcluded($mi_fecha_entrada, $mi_fecha_salida) || $res_fecha_entrada->eq($mi_fecha_entrada)) {
                        $valida -= 1;
                    }
                    if ($res_fecha_salida->betweenExcluded($mi_fecha_entrada, $mi_fecha_salida) || $res_fecha_salida->eq($mi_fecha_salida)) {
                        $valida -= 1;
                    }
                }
                if ($valida == count($habitacion->clients)) {

                    $rooms[] = $habitacion;
                }
            }
        }
        $rooms = $this->paginate($rooms);
        return view("cliente.busqueda.index", compact("request", "rooms"));
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => Paginator::resolveCurrentPath()]);
    }
}
