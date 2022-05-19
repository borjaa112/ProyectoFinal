@extends('admin.plantilla')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin/usuarios.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">correo electrónico</th>
                    <th scope="col">CIF</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($hoteles as $hotel)

                    <tr>
                        <td>
                            <img class="userimg pe-2 img-fluid" src="/{{ $hotel->img_path}}">{{ $hotel->nombre }}
                        </td>
                        <td>{{ $hotel->email }}</td>
                        <td>{{ $hotel->cif }}</td>
                        <td>{{ "Calle: ".$hotel->hotel_directions->calle. " num ". $hotel->hotel_directions->puerta." Provincia: ".$hotel->hotel_directions->provincia." Ciudad: ".$hotel->hotel_directions->ciudad. " CP: ". $hotel->hotel_directions->cod_postal}}</td>
                        <td>{{ $hotel->descripcion }}</td>
                        <td>{{ $hotel->created_at }}</td>


                        <td>
                            <form action="{{ route('hotel.destroy', $hotel) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>No hay ningún hotel registrado</td></tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
