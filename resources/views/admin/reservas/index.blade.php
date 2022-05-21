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
                    @foreach ($cliente->rooms as $habitacion)
                        <tr>
                            <td>
                                {{ $cliente->nombre . ' ' . $cliente->apellidos }}<br>
                            </td>
                            <td>{{$habitacion->hotel->nombre}}</td>
                            <td>{{$habitacion->pivot->precio}}€</td>
                            <td>{{$habitacion->pivot->tipo_pension}}</td>
                            <td>{{$habitacion->pivot->fecha_entrada}}</td>
                            <td>{{$habitacion->pivot->fecha_salida}}</td>
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
