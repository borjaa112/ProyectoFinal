@extends(Auth::guard("hotel")->check() ? 'hotel.plantilla' : 'cliente.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">{{ $hotel->nombre }}</div>
        <div class="row">
            <div class="col-auto">Habitaciones del hotel:</div>
        </div>
        <div class="row">
            @foreach ($hotel->rooms as $room)
                <div class="card" style="width: 18rem;">
                    <img src="/imgs/{{ $room->images_rooms[0]->img_path }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div>Camas disponibles: {{ $room->camas }}</div>
                        <div>Precio por noche: {{ $room->precio_noche }}€</div>
                        <div><a href="{{ route('habitacion.show', $room) }}"><button class="btn btn-info">Ver
                                    información</button></a></div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="h1 text-center">Contactar con {{ $hotel->nombre }}</div>
        <div class="h4 text-center">
            <div><i class="bi bi-envelope pe-2"></i><a href="mailto:{{ $hotel->email }}">{{ $hotel->email }}</a></div>
            <div><i class="bi bi-map pe-2"></i>Calle: {{ $hotel->hotel_directions->calle }} Patio:
                {{ $hotel->hotel_directions->patio }} Puerta {{ $hotel->hotel_directions->puerta }} Ciudad:
                {{ $hotel->hotel_directions->ciudad }}</div>
            <iframe scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas"
                src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q={{ $hotel->hotel_directions->calle }}%20%{{ $hotel->hotel_directions->puerta }}%20%{{ $hotel->hotel_directions->ciudad }}+(qq)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                width="520" height="400" frameborder="0"></iframe>
        </div>
    </div>
@endsection
