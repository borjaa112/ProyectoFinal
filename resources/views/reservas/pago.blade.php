@extends('cliente.plantilla')
@section('contenido')
    <div class="container">
        <div class="h3 text-center">Su reserva en {{ $habitacion->hotel->nombre }}</div>

        <div class="col-auto h3"><u>Resumen de tu reserva:</u> </div>
        <div class="row gap-5">
            <div class="col-5 p-3 text-center element-white border rounded-3">
                <div class="col-auto h5 pb-2">Fecha de entrada: <mark>{{ $fecha_entrada }}</mark></div>
                <div class="col-auto h5 pb-2">Fecha de salida: <mark>{{ $fecha_salida }}</mark></div>
                <div class="col-auto h5">Número de noches: <mark>{{ $noches }}</mark></div>
            </div>


            <div class="col-6 element-white border rounded-3">
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

                </div>
            </div>
        </div>
    </div>
@endsection
