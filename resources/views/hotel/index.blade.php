@extends('hotel.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>

        <div class="form-group row border border-primary">
            <div class="col">
                <label for="input_ciudad" class="col-6">Introduce ciudad</label>
            </div>
            <div class="col autocomplete">
                <input type="text" id="input_ciudad" class="m-1 form-control">
            </div>
            <div class="col">
                <label for="fecha_entrada">Introduce fecha de entrada</label>
            </div>
            <div class="col">
                <input type="date" class="m-1 form-control" id="fecha_entrada">
            </div>
            <div class="col">
                <label for="fecha_salida">Introduce fecha de salida</label>
            </div>
            <div class="col">
                <input type="date" class="m-1 form-control" id="fecha_salida">
            </div>
            <div class="col">
                <button type="button" class="m-1 btn btn-info"><i class="bi bi-search"></i></button>
            </div>

        </div>
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
                        <a href="{{ route('habitacion.show', $habitacion) }}">Enlace</a>
                    </div>

                    <br><br>
                    @foreach ($habitacion->services as $service)
                        {{ $service }}
                    @endforeach
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
