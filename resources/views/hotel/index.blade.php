@extends('hotel.plantilla')
@section('head')
    <link href="{{ asset('css/inicio/cliente.css') }}" rel="stylesheet">
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
@endsection
@section('contenido')
    <div class="container">

        <h1>Agencia Hotelera</h1>

        <div class="form-group row border border-primary">
            <form method="post" action="{{ route('buscar') }}">
                @csrf
                @method('get')
                <div class="col">
                    <label for="input_ciudad" class="col-6">Introduce ciudad</label>
                </div>
                <div class="col autocomplete">
                    <input type="text" id="input_ciudad" name="input_ciudad" class="m-1 form-control">
                </div>
                <div class="col">
                    <label for="fecha_entrada">Introduce fecha de entrada</label>
                </div>
                <div class="col">
                    <input type="date" name="fecha_entrada" class="m-1 form-control" id="fecha_entrada">
                </div>
                <div class="col">
                    <label for="fecha_salida">Introduce fecha de salida</label>
                </div>
                <div class="col">
                    <input type="date" name="fecha_salida" class="m-1 form-control" id="fecha_salida">
                </div>
                <div class="col">
                    <button type="submit" class="m-1 btn btn-info"><i class="bi bi-search"></i></button>
                </div>
            </form>
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
