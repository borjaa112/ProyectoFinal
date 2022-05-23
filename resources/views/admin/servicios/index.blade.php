@extends('admin.plantilla')
@section('contenido')
    <div class="container">
        <div class="h1 text-center">Añadir servicios</div>

        <div class="pt-3">
            <form action="{{ route('servicios.store') }}" method="POST" class="d-flex justify-content-center">
                <div class="mb-3 col-6 element-white p-4 rounded-2">
                    @csrf
                    @method('post')
                    <label for="servicio" class="form-label">Nombre del servicio</label>
                    <input type="text" name="servicio" class="form-control" id="servicio" placeholder="Aire acondicionado">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary text-right mt-3">Añadir</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="h1 text-center">Servicios añadidos</div>
        <div class="d-flex justify-content-center">
            <div class="col-6">
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $servicio)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $servicio->servicio }}</td>
                                <td>
                                    <form action="{{route("servicios.destroy", $servicio)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
