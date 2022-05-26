@extends('cliente.plantilla')
@section('head')
    <script src="{{ asset('js/hotel/test.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/inicio/cliente.css') }}">
@endsection
@section('contenido')
    <div class="container">
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
        <div class="form-group row border rounded-2 element-white mt-2 mb-2">
            <form method="get" action="{{ route('buscar') }}">
                @csrf
                @method('get')
                <div class="justify-content-center row g-3">
                    <div class="col-lg-4 col-sm-5">
                        <label for="input_ciudad" class="col-6">Introduce ciudad</label>
                        <div class="col autocomplete">
                            <input type="text" id="input_ciudad" name="input_ciudad" class="m-1 form-control"
                                autocomplete="off" value="{{ $request->get('input_ciudad') }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <label for="fecha_entrada">Introduce fecha de entrada</label>
                        <div class="col">
                            <input type="date" name="fecha_entrada" class="m-1 form-control" id="fecha_entrada"
                                value="{{ $request->get('fecha_entrada') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4">
                        <label for="fecha_salida">Introduce fecha de salida</label>
                        <div class="col">
                            <input type="date" name="fecha_salida" class="m-1 form-control" id="fecha_salida"
                                value="{{ $request->get('fecha_salida') }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="m-1 btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        @foreach ($rooms as $habitacion)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        @forelse ($habitacion->images_rooms as $image_room)
                            @if ($loop->first)
                                <img class="img-fluid rounded-start" src="/imgs/{{ $image_room->img_path }}">
                            @endif
                        @empty
                            <img style="height: 200px; width: 300px" src="{{ asset('imgs/room_images/not-found.png') }}">
                        @endforelse
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $habitacion->hotel->nombre }}</h5>
                            <div class="h5"><strong>Camas Disponibles:</strong> {{ $habitacion->camas }}
                            </div>
                            <p class="card-text"><small class="text-muted">Esta habitación ha sido reservada
                                    {{ count($habitacion->clients) }} veces </small>
                            </p>
                            <p class="text-end h4">Precio Total:
                                {{ $habitacion->precio_noche * \Carbon\Carbon::createFromFormat('Y-m-d', $request->fecha_entrada)->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d', $request->fecha_salida)) }}€
                            </p>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-info" href="{{ route('habitacion.show', $habitacion) }}">Ver
                                    detalles</a>
                            </div>
                            <p class="text-end">*Precio por noche: {{ $habitacion->precio_noche }}€</p>
                            <form action="{{ route('reservar.create') }}" method="GET">
                                @csrf
                                <input type="hidden" name="habitacion" value="{{ $habitacion->id }}">
                                <input type="hidden" name="fecha_salida" value="{{ $request->fecha_salida }}">
                                <input type="hidden" name="fecha_entrada" value="{{ $request->fecha_entrada }}">
                                <input type="submit" class="btn btn-info" value="Reservar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $rooms->appends(request()->input())->links() }}

        </div>
    </div>
@endsection
