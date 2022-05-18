@extends('admin.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>

        <div class="col-12">
            <p class="h2 mt-5">Últimas habitaciones añadidas</p>
            @foreach ($habitaciones as $habitacion)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @foreach ($habitacion->images_rooms as $image_room)
                                @if ($loop->first)
                                    <img src="/imgs/{{ $image_room->img_path }}" class="img-fluid rounded-start"
                                        alt="...">
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $habitacion->hotel->nombre }}</h5>
                                <div class="col">Precio por noche: {{ $habitacion->precio_noche }}€</div>
                                <div class="col">Camas: {{ $habitacion->camas }}</div>
                                <div class="col">Servicios:</div>
                                @foreach ($habitacion->services as $servicio)
                                    <div>{{ $servicio->servicio }} </div>
                                @endforeach
                                <p class="card-text"><small
                                        class="text-muted">{{ $habitacion->created_at }}</small>
                                </p>
                                <div class="col">
                                    <a href="{{ route('habitacion.show', $habitacion) }}"><button
                                            class="btn btn-info">Ver Habitación</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
