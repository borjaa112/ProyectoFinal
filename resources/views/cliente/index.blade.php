@extends('cliente.plantilla')
@section('contenido')
    <div class="container">
        <h1>Agencia Hotelera</h1>
        <div class="form-group row border border-primary">
            <div class="col">
                <label for="input_ciudad" class="col-6">Introduce ciudad</label>
            </div>
            <div class="col">
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
                <button type="button" class="m-1 btn btn-primary">Buscar</button>
            </div>

        </div>
        <div class="row border border-secondary mt-5">
            <div class="col">
                <p>Ultimos hoteles añadidos</p>
            </div>
        </div>
    </div>
@endsection
