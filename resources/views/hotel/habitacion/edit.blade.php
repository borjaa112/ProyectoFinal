@extends(Auth::guard("hotel")->check() ? 'hotel.plantilla' : "admin.plantilla")
@section("head")
<script src="{{asset("js/hotel/habitacion/edit.js")}}" defer></script>
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
        <h2 class="text-center">Añadir habitación</h2>

        <input type="text" id="room_id" value="{{$room->id}}" hidden>

        <form action="{{ route('habitacion.update', $room) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="col-2">
                        <label for="camas" class="col-form-label">Precio por noche</label>
                    </div>

                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="precio-noche"
                                aria-label="Amount (to the nearest dollar)" value="{{ $room->precio_noche }}">
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
                    <input type="number" id="camas" name="camas" class="form-control" value="{{ $room->camas }}">
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

                    </select>
                </div>
            </div>

            <div class="row d-flex justify-content-evenly">
                <div class="col-auto"><button type="submit" class="btn btn-primary">Guardar Cambios</button></div>
            </div>
        </form>
        <div class="row">
            <div class="d-flex justify-content-center">
                @foreach ($room->images_rooms as $image)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="d-block mb-4 h-100">
                            <form method="post" action="{{ route('roomimage.destroy', $image) }}">
                                @csrf
                                @method('delete')
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger eliminar"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                                <img class="img-fluid img-thumbnail" src="/imgs/{{ $image->img_path }}">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
