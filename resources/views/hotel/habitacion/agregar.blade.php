@extends('hotel.plantilla')
@section('contenido')
    <div class="container">
        <h2 class="text-center">Añadir habitación</h2>

        <form action="{{ route('crearhabitacion.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row d-flex justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="col-2">
                        <label for="camas" class="col-form-label">Precio por noche</label>
                    </div>

                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="precio-noche" aria-label="Amount (to the nearest dollar)">
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
                        <input type="file" class="form-control" id="imagenes" aria-describedby="inputGroupFileAddon03"
                            aria-label="Upload">
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
                    <label for="camas" class="col-form-label">Tipo de pensión</label>
                </div>
                <div class="col-6">
                    <select name="pension" class="form-select">
                        <option value="SA">Solo alojamiento</option>
                        <option value="AD">Alojamiento y desayuno</option>
                        <option value="MP">Pensión completa</option>
                        <option value="PC">Pension completa</option>
                        <option value="TD">Todo incluido</option>
                    </select>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="descripcion" class="col-form-label">Descripción</label>
                </div>
                <div class="col-6">
                    <textarea name="descripcion" id="descripcion" class="w-100"></textarea>
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
