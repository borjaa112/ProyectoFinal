@extends('cliente.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/inicio/cliente.css') }}">
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>
        @if ($errors->any())
            <div class="alert alert-warning">
                Para continuar debe de solucionar los siguientes problemas:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <div class="form-group pe-3 ps-3 pt-2 pb-2 border rounded-2 element-white">
                <form method="get" action="{{ route('buscar') }}">
                    @csrf
                    @method('get')
                    <div class="col">
                        <label for="input_ciudad" class="col-6">Introduce ciudad</label>
                    </div>
                    <div class="col autocomplete">
                        <input type="text" id="input_ciudad" name="input_ciudad" class="m-1 form-control" autocomplete="off">
                    </div>
                    <div class="col">
                        <label for="fecha_entrada">Introduce fecha de entrada</label>
                    </div>
                    <div class="col">
                        <input type="date" name="fecha_entrada" class="m-1 form-control" id="fecha_entrada">
                    </div>
                    <div class="col">
                        <label for="fecha_salida">Introduce numero de noches</label>
                    </div>
                    <div class="col">
                        <input type="number" name="fecha_salida" class="m-1 form-control" id="fecha_salida">
                    </div>
                    <div class="col">
                        <button type="submit" class="m-1 btn btn-info"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div>

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
@endsection
