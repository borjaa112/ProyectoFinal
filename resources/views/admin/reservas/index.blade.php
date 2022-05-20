@extends('admin.plantilla')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin/usuarios.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Habitación - Hotel</th>
                    <th scope="col">Precio pagado</th>
                    <th scope="col">Pensión seleccionada</th>
                    <th scope="col">Fecha de entrada</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    @foreach($cliente->rooms() as $habitacion)
                        {{$cliente->nombre." ".$cliente->apellidos}}<br>
                        {{$cliente->pivot}} 
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
