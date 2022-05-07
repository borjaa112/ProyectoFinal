@extends("hotel.plantilla")
@section('contenido')
    {{ $room }}
    @foreach ($room->images_rooms as $imagen)
        <img src="/imgs/{{ $imagen->img_path }}">
    @endforeach
@endsection
