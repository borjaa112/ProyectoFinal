@extends('admin.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Admin panel</div>

        <div class="row gap-3 text-center justify-content-center pt-5">
            <div class="col-3 border border-secondary rounded-2 p-5">
                Administrar usuarios
            </div>
            <div class="col-3 border border-secondary rounded-2 p-5">
                Administrar hoteles
            </div>
        </div>
        <div class="row gap-3 pt-5 text-center justify-content-center">
            <div class="col-3 border border-secondary rounded-2 p-5">
                Administrar habitaciones
            </div>
            <div class="col-3 border border-secondary rounded-2 p-5">
                Ver reservas
            </div>

        </div>

    </div>
@endsection
