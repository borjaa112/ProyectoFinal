@extends('cliente.plantilla')
@section('contenido')
    <div class="container-fluid">
        <div class="bg-image row"
            style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('imgs/inicio/fondo.jpg') }}'); height: 90vh">
            <div class="d-flex align-items-center justify-content-center">
                <div class="card text-dark bg-warning mb-3 col-6 m-5">
                    <div class="card-header">Login</div>
                    <div class="card-body mt-2 mb-2">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <label for="email">Correo electronico</label>
                            <div class="input-group">
                                <input type="text" id="email" name="email" class="form-control">
                            </div>

                            <label for="password">Contraseña</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Iniciar sesión</button>
                        </form>
                        <div class="text-center text-secondary fs-6">¿No tienes cuenta? <a href="{{ route('registro') }}"
                                class="text-secondary fs-6">Registrate aquí</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
