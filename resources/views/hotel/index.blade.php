@extends('hotel.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>

        <div class="row border border-secondary mt-5">
            <div class="col">
                <p>Ultimas habitaciones añadidas</p>

                @foreach ($habitaciones as $habitacion)
                    <div class="border border-primary">
                        Hotel: {{ $habitacion->hotel->nombre }}
                        <br>
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

                    <br><br>
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
