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
                    <th scope="col">correo electrónico</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)

                    <tr>
                        <td>
                            <img src="{{ asset('imgs/room_images/K05W90pImpCuSlEbxgbtwcoljaYPZDoVtnNrWQsH.jpg') }}"
                                class="userimg pe-2 img-fluid rounded-circle">{{ $cliente->nombre . ' ' . $cliente->apellidos }}
                        </td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->nif }}</td>
                        <td>{{ $cliente->created_at }}</td>
                        <td>
                            <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>No hay ningún usuario registrado</td></tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
