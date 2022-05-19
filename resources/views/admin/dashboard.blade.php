@extends('admin.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Admin panel</div>

        <div class="row gap-3 text-center justify-content-center pt-5">
            <div class="col-3 border border-secondary rounded-2 p-5">
                <a href="{{route("administrar_usuarios")}}"> Administrar usuarios</a>
            </div>
            <div class="col-3 border border-secondary rounded-2 p-5">
                <a href="{{route("administrar_hoteles")}}">Administrar hoteles</a>
            </div>
        </div>
        <div class="row gap-3 pt-5 text-center justify-content-center">
            <div class="col-3 border border-secondary rounded-2 p-5">
                <a href="{{route("administrar_habitaciones")}}">Administrar habitaciones</a>
            </div>
            <div class="col-3 border border-secondary rounded-2 p-5">
                <a href="{{route("ver_reservas")}}">Ver reservas</a>
            </div>

        </div>

    </div>
@endsection
