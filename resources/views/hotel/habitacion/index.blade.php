@extends(Auth::guard('hotel')->check() ? 'hotel.plantilla' : (Auth::guard('client')->check() ? 'cliente.plantilla' : 'admin.plantilla'))
@section('head')
    <link rel="stylesheet" href="{{ asset('css/hotel/habitacion/index.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <div class="h1 text-center">{{ $room->hotel->nombre }}</div>
        <div class="text-center"><u><i class="bi bi-geo-alt-fill"></i>{{$room->hotel->hotel_directions->calle." ".$room->hotel->hotel_directions->puerta.",".$room->hotel->hotel_directions->ciudad." (".$room->hotel->hotel_directions->cod_postal.")"}}</u></div>
        <div class="row mt-3">
            <div id="carouselExampleIndicators" class="carousel slide col-xs-12 col-lg-6" data-bs-ride="carousel"
                data-bs-interval="false">
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
            <div class="element-white border border-3 border-info rounded-3 col-xs-12 col-lg-6">
                <div class="descripcion">
                    {{ $room->hotel->descripcion }}
                    <hr>
                    <div>
                        Servicios Disponibles:
                        <ul>
                            @foreach ($room->services as $service)
                                <li>
                                    {{ $service->servicio }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::guard("hotel")->check() && $room->hotel_id === Auth::guard("hotel")->user()->id || Auth::guard('web')->check())
            <div class="row d-flex pt-2">
                <div class="col d-flex justify-content-center">
                    <div class="col-md-3 col-lg-2">
                        <a href="{{ route('habitacion.edit', $room) }}">
                            <button type="button" class="btn btn-info">Editar habitacion</button>
                        </a>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <form action="{{ route('habitacion.destroy', $room) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar habitación</button>
                        </form>
                    </div>

                </div>

            </div>
        @endif
        <div class="mt-4">
            <a href="{{ route('hotel.show', $room->hotel) }}">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-info btn-lg col-6">Ver información del hotel</button>
                </div>
            </a>
        </div>
    </div>
    @endsection
