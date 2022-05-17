@extends('cliente.plantilla')
@section('head')
    <script defer src="{{ asset('js/pago/sumprice.js') }}"></script>
@endsection
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Su reserva en {{ $habitacion->hotel->nombre }}</div>

        <input hidden value="{{ $habitacion->id }}" id="id_habitacion">

        <div class="col-auto h4"><u>Resumen de tu reserva:</u> </div>
        <div class="row gap-5">
            <div class="col-5 p-3 text-center element-white border rounded-3">
                <div class="col-auto h5 pb-2">Fecha de entrada: <mark>{{ $fecha_entrada }}</mark></div>
                <div class="col-auto h5 pb-2">Fecha de salida: <mark>{{ $fecha_salida }}</mark></div>
                <div class="col-auto h5">Número de noches: <mark>{{ $noches }}</mark></div>
            </div>


            <div class="col-6 element-white border rounded-3 pensiones">
                <div class="div">Selecciona el tipo de pensión:</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pension" value="SP" id="SP" required>
                    <label class="form-check-label" for="SP">
                        Sin pensión
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pension" value="MP" id="MP" required>
                    <label class="form-check-label" for="MP">
                        Media Pensión
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pension" value="PC" id="PC">
                    <label class="form-check-label" for="PC">
                        Pensión completa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pension" value="HD" id="HD">
                    <label class="form-check-label" for="HD">
                        Alojamiento y Desayuno
                    </label>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="d-flex justify-content-center">
                <div class="col-8 element-white border rounded-3 p-3">
                    <div class="col-12">
                        <img src="/imgs/{{ $habitacion->images_rooms[0]->img_path }}" class="rounded-pill col-3 img-fluid">
                        Habitacion en: {{ $habitacion->hotel->nombre }}
                    </div>
                    <hr>
                    <div class="h4">Precio por noches: {{ $habitacion->precio_noche * $noches }}€</div>
                    <div class="h4">Precio por extras: <span id="extras">0</span>€</div>

                    <div class="h2 text-end ">Precio Total: <span
                            id="precio">{{ $habitacion->precio_noche * $noches }}</span>€</div>
                </div>
            </div>
        </div>
        <form action="{{route("reservar.store")}}" method="POST">
            @csrf
            <input name="room_id" value="{{ $habitacion->id }}" hidden>
            <input type="date" name="fecha_form" value="{{$fecha_entrada}}" hidden>
            <input type="text" name="noches_form" value="{{$noches}}" hidden>
            <input name="precio_form" id="precio_form" hidden>
            <input name="pension_form" id="pension_form" hidden>
            <button type="submit" class="btn btn-info">Pagar</button>

        </form>
    </div>
@endsection
