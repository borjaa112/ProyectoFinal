@extends('cliente.plantilla')
@section('contenido')
    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-image row"
            style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('imgs/inicio/fondo-admin.jpg') }}'); height: 90vh">
            <div class="d-flex align-items-center justify-content-center">
                <div class="card text-dark bg-warning mb-3 col-6 m-5">
                    <div class="card-header">Registro - Admin</div>
                    <div class="card-body mt-2 mb-2">
                        <form action="{{ route('admin-registro') }}" method="POST">
                            @csrf


                            <label for="nombre">Nombre</label>
                            <div class="input-group">
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>


                            <label for="email">Correo electronico</label>
                            <div class="input-group">
                                <input type="text" id="email" name="email" class="form-control">
                            </div>

                            <label for="password">Contraseña</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <label for="password_confirmation">Vuelve a introducir la contraseña</label>
                            <div class="input-group">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Registro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
