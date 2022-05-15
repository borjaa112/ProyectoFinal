@extends('hotel.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>

        <div class="col-12">
            <p class="h2 mt-5">Últimas habitaciones añadidas</p>
            @foreach ($habitaciones as $habitacion)
                <div class="mt-4 mb-4 p-2 col border rounded-2 element-white">
                    @foreach ($habitacion->images_rooms as $image_room)
                        @if ($loop->first)
                            <img class="img-fluid img-thumbnail" src="/imgs/{{ $image_room->img_path }}">
                        @endif
                    @endforeach
                    {{ $habitacion->hotel->nombre }}
                    {{-- {{dd($habitacion)}} --}}

                    Precio por noche: {{ $habitacion->precio_noche }}€
                    <br>
                    Camas: {{ $habitacion->camas }}
                    <br>
                    @foreach ($habitacion->services as $servicio)
                        Servicios: {{ $servicio->servicio }}
                    @endforeach
                    <a href="{{ route('habitacion.show', $habitacion) }}">Enlace</a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
