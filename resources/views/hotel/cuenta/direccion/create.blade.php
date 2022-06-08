@extends('hotel.plantilla')
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
        <h2 class="text-center">Introduzca su direccion</h2>
        <div class="d-flex justify-content-center">
            <form method="POST" class="col-6" action="{{ route('direccion-hotel.store') }}">
                @method('POST')
                @csrf

                <div class="mb-3">
                    <input id="calle" name="calle" class="form-control" placeholder="calle">
                </div>
                <div class="mb-3">
                    <input id="patio" name="patio" class="form-control" placeholder="patio">
                </div>

                <div class="mb-3">
                    <input id="puerta" name="puerta" class="form-control" placeholder="puerta">
                </div>

                <div class="mb-3">
                    <input id="cod_postal" name="cod_postal" class="form-control" type="text" placeholder="cod_postal">
                </div>

                <div class="mb-3">
                    <label for="provincia">Provincia</label>
                    <input id="provincia" name="provincia" class="form-control" type="text" placeholder="Provincia">
                </div>

                <div class="mb-3">
                    <label for="ciudad">Ciudad</label>
                    <input id="ciudad" name="ciudad" class="form-control" type="text" placeholder="Ciudad">
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    @endsection
