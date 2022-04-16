@extends('cliente.plantilla')
@section('contenido')
    <h1>Agencia Hotelera</h1>
    <div class="form-group row">
        <div class="col">
            <label for="input_ciudad" class="col-6">Introduce ciudad</label>
        </div>
        <div class="col">
            <input type="text" id="input_ciudad" class="form-control">
        </div>
        <div class="col">
            <label for="fecha_entrada">Introduce fecha de entrada</label>
        </div>
        <div class="col">
            <input type="date" class="form-control" id="fecha_entrada">
        </div>
        <div class="col">
            <label for="fecha_salida">Introduce fecha de salida</label>
        </div>
        <div class="col">
            <input type="date" class="form-control" id="fecha_salida">
        </div>
    </div>
@endsection
