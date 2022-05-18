@extends(Auth::guard('hotel')->check() ? 'hotel.plantilla' : 'cliente.plantilla')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/hotel/habitacion/index.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <div class="h1 text-center">{{ $room->hotel->nombre }}</div>

        <div class="row mt-3">
            <div id="carouselExampleIndicators" class="carousel slide col-6" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($room->images_rooms as $imagen)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img src="/imgs/{{ $imagen->img_path }}" class="d-block w-100" alt="...">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="/imgs/{{ $imagen->img_path }}" class="d-block w-100" alt="...">
                            </div>
                        @endif
                    @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="border border-2 border-dark p-2 col-6">
                <div class="descripcion">
                    {{ $room->hotel->descripcion }}
                    <div>
                        Servicios Disponibles:
                        @foreach ($room->services as $service)
                            <div class="col">
                                {{ $service->servicio }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::guard('hotel')->check())
            <div class="d-flex justify-content-center pt-2">
                <a href="{{ route('habitacion.edit', $room) }}">
                    <button type="button" class="btn btn-danger">Editar habitacion</button>
                </a>
            </div>
        @endif
        <a href="{{ route('hotel.show', $room->hotel) }}">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-info btn-lg col-6 mt-4">Ver información del hotel</button>
            </div>
        </a>
    @endsection
