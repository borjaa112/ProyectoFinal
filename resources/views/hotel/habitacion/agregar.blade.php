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
        <h2 class="text-center">Añadir habitación</h2>

        <form action="{{ route('habitacion.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row d-flex justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="col-2">
                        <label for="camas" class="col-form-label">Precio por noche</label>
                    </div>

                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="precio-noche"
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="imagenes" class="col-form-label">Imagenes</label>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="imagenes" name="imagenes[]"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload" accept="image/*" multiple>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="camas" class="col-form-label">Número de camas</label>
                </div>
                <div class="col-6">
                    <input type="number" id="camas" name="camas" class="form-control">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="servicios" class="col-form-label">Selecciona los servicios</label>
                </div>
                <div class="col-6">
                    <select class="form-select" name="servicios[]" multiple aria-label="multiple select">
                        <option disabled>Selecciona opciones</option>

                        @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                        @endforeach
                        {{-- <option value="TV en la habitacion">TV en la habitacion</option>
                        <option value="Aire acondicionado">Aire acondicionado</option>
                        <option value="Secador">Secador</option>
                        <option value="Minibar">Minibar</option>
                        <option value="Terraza">Terraza</option>
                        <option value="Baño privado">Baño privado</option> --}}
                    </select>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="MP" class="col-form-label">Precio Media pension</label>
                </div>
                <div class="col-6">
                    <input type="number" name="MP" id="MP" class="form-control">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="PC" class="col-form-label">Precio Pension Completa</label>
                </div>
                <div class="col-6">
                    <input type="number" name="PC" id="PC" class="form-control">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="HD" class="col-form-label">Precio Alojamiento y Desayuno</label>
                </div>
                <div class="col-6">
                    <input type="number" name="HD" id="HD" class="form-control">
                </div>
            </div>
            <div class="row d-flex justify-content-evenly">
                <div class="col-auto"><button type="submit" class="btn btn-primary">Publicar</button></div>
            </div>
        </form>
        <div class="row">
            <div class="d-flex justify-content-center">
                <div id="vistaprevia" class="rounded border col-8 mt-5">
                    Vista previa
                </div>
            </div>
        </div>

    </div>
@endsection
