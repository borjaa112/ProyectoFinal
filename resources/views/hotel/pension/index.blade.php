@extends('hotel.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Precio de las pensiones</div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <table class="table border-3 table-striped">
                    <tr>
                        <th>Alojamiento y Desayuno</th>
                        <th>Media pensión</th>
                        <th>Pension Completa</th>
                    </tr>
                    <tr>
                        <td>{{$hotel->precio_hd}}€</td>
                        <td>{{$hotel->precio_mp}}€</td>
                        <td>{{$hotel->precio_pc}}€</td>


                    </tr>
                </table>
            </div>
        </div>

        <div class="h1 text-center pt-5">Añadir/Editar precio</div>
        <div class="d-flex justify-content-center col-12">
            <form action="{{route("pension.update", $hotel)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="">
                    <select name="pensiones" id="pensiones" class="form-select" required>
                        <option value="HD">Alojamiento y Desayuno (HD)</option>
                        <option value="MP">Media Pensión (MD)</option>
                        <option value="PC">Pensión Completa (PC)</option>
                    </select>
                </div>
                <div class="pt-3">
                    <label for="precio" class="form-label">Precio del tipo de pensión seleccionado</label>
                    <input type="number" name="precio" class="form-control">
                </div>
                <div class="d-flex justify-content-center pt-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-check"></i></button></div>
            </form>
        </div>
    </div>
@endsection
