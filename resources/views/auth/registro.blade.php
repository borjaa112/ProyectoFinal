@extends('cliente.plantilla')
@section('head')
    <link href="{{ asset('css/auth/registro.css') }}" rel="stylesheet">
    <script src="{{ asset('js/auth/registro.js') }}" async></script>
@endsection
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="video-container">
        <video src="{{ asset('imgs/registro/video.mp4') }}" autoplay loop playsinline muted></video>
        <div class="d-flex align-items-center justify-content-center">

            <div class="card text-dark bg-warning mb-3 col-6 m-5">
                <div class="card-header">Registro</div>
                <div class="card-body mt-2 mb-2">
                    <form action="{{ route('registro') }}" method="POST">
                        @csrf
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="cliente" name="typeUser" value="cliente" class="form-check-input"
                                    checked>
                                <label for="cliente" class="form-check-label">Cliente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="hotel" name="typeUser" value="hotel" class="form-check-input">
                                <label for="hotel" class="form-check-label">Hotel</label>
                            </div>
                        </div>
                        <label for="nombre" class="nombre">Nombre</label>
                        <div class="input-group">
                            <input type="text" name="nombre" id="nombre" class="form-control nombre" required>
                        </div>

                        <label for="apellidos" class="apellidos">Apellidos</label>
                        <div class="input-group">
                            <input type="text" name="apellidos" id="apellidos" class="form-control apellidos" required>
                        </div>

                        <label for="email">Correo electronico</label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <label for="password_confirmation">Vuelve a introducir la contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>

                        <label for="descripcion" class="descripcion">Descripción del hotel</label>
                        <div class="input-group">
                            <textarea id="descripcion" name="descripcion" class="form-control descripcion"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Registrarse</button>
                    </form>
                </div>

            </div>
        </div>

        </div>
    </section>
@endsection
