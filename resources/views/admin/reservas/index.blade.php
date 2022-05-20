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
                @foreach ($reservas as $reserva)
                    @foreach ($reserva->rooms as $habitaciones_reservadas)
                        {{$habitaciones_reservadas->pivot}}
                    @endforeach
                    <th>

                        <td>sw</td>
                    </th>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
