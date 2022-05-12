@extends("hotel.plantilla")
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Añadir fotos de las instalaciones</div>
        <form method="post" action="{{ route('instalaciones.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="input-group mb-3">
                <label class="input-group-text" for="imagenes">Upload</label>
                <input type="file" class="form-control" name="imagenes[]" id="imagenes">
            </div>
            <input type="submit">
        </form>

        Tus Imagenes añadidas:
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

                @foreach ($hotel as $hotel_images)
                    @foreach ($hotel_images->hotel_images as $image)
                        <img src="/imgs/{{ $image->img_path }}">
                    @endforeach
                @endforeach
            </div>
        </div>
    @endsection
