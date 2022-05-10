@extends("hotel.plantilla")
@section('contenido')
    <div class="container">
        <h2 class="text-center">Introduzca su direccion</h2>
        <div class="d-flex justify-content-center">
            <form method="POST" class="col-6" action="{{route("direccion.update", $hotel_direction)}}">
                @method("put")
                @csrf

                <div class="mb-3">
                    <input id="calle" name="calle" class="form-control" placeholder="calle" value="{{$hotel_direction->calle}}">
                </div>
                <div class="mb-3">
                    <input id="patio" name="patio" class="form-control" placeholder="patio" value="{{$hotel_direction->patio}}">
                </div>

                <div class="mb-3">
                    <input id="puerta" name="puerta" class="form-control" placeholder="puerta" value="{{$hotel_direction->puerta}}">
                </div>

                <div class="mb-3">
                    <input id="cod_postal" name="cod_postal" class="form-control" type="text"
                        placeholder="cod_postal" value="{{$hotel_direction->cod_postal}}">
                </div>

                <div class="mb-3">
                    <label for="provincia">Provincia</label>
                    <input id="provincia" name="provincia" class="form-control" type="text"
                        placeholder="Provincia" value="{{$hotel_direction->provincia}}">
                </div>

                <div class="mb-3">
                    <label for="ciudad">Ciudad</label>
                    <input id="ciudad" name="ciudad" class="form-control" type="text"
                        placeholder="Ciudad" value="{{$hotel_direction->ciudad}}">
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    @endsection
