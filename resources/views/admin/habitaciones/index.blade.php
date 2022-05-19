@extends('admin.plantilla')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin/usuarios.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Precio Noche</th>
                    <th scope="col">Camas</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($habitaciones as $habitacion)
                    <tr>
                        <td>
                            <img class="userimg pe-2 img-fluid" src="/imgs/{{ $habitacion->images_rooms[0]->img_path }}">
                        </td>
                        <td>{{$habitacion->hotel->nombre}}</td>
                        <td>{{$habitacion->precio_noche}}</td>
                        <td>{{$habitacion->camas}}</td>
                        <td>{{$habitacion->created_at}}</td>
                        <td>
                            <form action="{{ route('habitacion.destroy', $habitacion) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>No hay ninguna habitación registrada</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
