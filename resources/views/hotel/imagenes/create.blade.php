@extends('hotel.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Añadir fotos de las instalaciones</div>
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
        <form method="post" action="{{ route('instalaciones.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="imagenes[]" id="imagenes" accept="image/*" multiple>
                <button type="submit" class="btn btn-info">Subir imgs</button>
            </div>
        </form>
        <hr>
        <div class="h1 text-center">{{ count($hotel->hotel_images) }} imágenes añadidas:</div>
        <div class="row text-center text-lg-start">

            @foreach ($hotel->hotel_images as $image)
                <div class="col-lg-3 col-md-4 col-6">

                    <form method="post" action="{{ route('instalaciones.destroy', $image) }}">
                        @csrf
                        @method('delete')
                        <div class="d-block mb-4 h-100">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-danger" type="submit" title="Eliminar" style="position:absolute;"><i
                                        class="bi bi-trash"></i></button>
                            </div>
                            <img class="img-fluid img-thumbnail" src="/imgs/{{ $image->img_path }}">
                        </div>
                    </form>
                </div>
            @endforeach

        </div>
    </div>
@endsection
