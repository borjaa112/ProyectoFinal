@extends("cliente.plantilla")
@section('contenido')
    <div class="container">
        @foreach ($hoteles as $hotel)
            @foreach ($hotel->rooms as $habitacion)
                <div class="row border border-2 mb-3">
                    <div class="col-auto">
                        @forelse ($habitacion->images_rooms as $image_room)
                            @if ($loop->first)
                                <img style="height: 200px; width: 200px" src="/imgs/{{ $image_room->img_path }}">
                            @endif
                        @empty
                            <img style="height: 200px; width: 200px" src="{{ asset('imgs/room_images/not-found.png') }}">
                        @endforelse
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
