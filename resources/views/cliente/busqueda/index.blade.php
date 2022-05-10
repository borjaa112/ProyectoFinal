@extends("hotel.plantilla")
@section('contenido')
    <div class="container">
        @foreach ($hoteles as $hotel)
            @foreach ($hotel->rooms as $habitacion)
                <div class="row border border-2 mb-3">
                    <div class="col-auto">
                        <img style="height: 200px; width: 200px" src="/imgs/{{ $habitacion->images_rooms[0]->img_path }}">
                    </div>
                    <div class="col-auto">
                        Hotel: {{ $hotel->nombre }}
                        Precio: {{ $habitacion->precio_noche }}

                    </div>
                    <a class="btn btn-info" href="{{ route('habitacion.show', $habitacion) }}">Ver detalles</a>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
