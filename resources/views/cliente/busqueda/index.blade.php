@extends('cliente.plantilla')
@section('head')
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/inicio/cliente.css') }}">
@endsection
@section('contenido')
    <div class="container">
        @if ($errors->any())
            Para continuar debe de solucionar los siguientes problemas:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group row border border-primary">
            <form method="get" action="{{ route('buscar') }}">
                @csrf
                @method('get')
                <div class="row">
                    <div class="col">
                        <label for="input_ciudad" class="col-6">Introduce ciudad</label>
                    </div>
                    <div class="col autocomplete">
                        <input type="text" id="input_ciudad" name="input_ciudad" class="m-1 form-control" autocomplete="off"
                            value="{{ $request->get('input_ciudad') }}">
                    </div>
                    <div class="col">
                        <label for="fecha_entrada">Introduce fecha de entrada</label>
                    </div>
                    <div class="col">
                        <input type="date" name="fecha_entrada" class="m-1 form-control" id="fecha_entrada"
                            value="{{ $request->get('fecha_entrada') }}">
                    </div>
                    <div class="col">
                        <label for="fecha_salida">Introduce fecha de salida</label>
                    </div>
                    <div class="col">
                        <input type="number" name="fecha_salida" class="m-1 form-control" id="fecha_salida"
                            value="{{ $request->get('fecha_salida') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="m-1 btn btn-info"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        @foreach ($hoteles as $hotel)
            @foreach ($hotel->rooms as $habitacion)
                <div class="d-flex align-items-center row border border-2 mb-3">
                    <div class="col-auto">
                        @forelse ($habitacion->images_rooms as $image_room)
                            @if ($loop->first)
                                <img style="height: 200px; width: 300px" src="/imgs/{{ $image_room->img_path }}">
                            @endif
                        @empty
                            <img style="height: 200px; width: 300px" src="{{ asset('imgs/room_images/not-found.png') }}">
                        @endforelse
                    </div>
                    <div class="col-7 align-items-center">
                        <div class="row">
                            <div class="h1">{{ $hotel->nombre }}</div>
                        </div>
                        <div class="row">
                            <div class="h5"><strong>Camas Disponibles:</strong> {{ $habitacion->camas }}
                            </div>
                        </div>

                    </div>
                    <div class="col-2">
                        <div class="row h3 text-center justify-content-center">
                            Precio Total: {{ $habitacion->precio_noche * $request->get('fecha_salida') }}€

                        </div>
                        <div class="row justify-content-end">
                            <a class="btn btn-info" href="{{ route('habitacion.show', $habitacion) }}">Ver detalles</a>
                            <p class="text-center">*Precio por noche: {{ $habitacion->precio_noche }}€</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
