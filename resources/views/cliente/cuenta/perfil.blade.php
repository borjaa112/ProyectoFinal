@extends("cliente.plantilla")
@section('contenido')
    <div class="container">
        <h2 class="text-center">Modifique sus datos</h2>
        <div class="d-flex justify-content-center">
            <form method="post" action="{{route("cuenta.update", Auth::guard("client")->user())}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" class="form-control" value="{{ Auth::guard("client")->user()->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" name="apellidos" class="form-control" value="{{ Auth::guard("client")->user()->apellidos }}">
                </div>

                <div class="mb-3">
                    <label for="dni">DNI/NIF</label>
                    <input id="dni" name="dni" class="form-control" value="{{ Auth::guard("client")->user()->nif }}">
                </div>

                <div class="mb-3">
                    <label for="email">email</label>
                    <input id="email" name="email" class="form-control" value="{{ Auth::guard("client")->user()->email }}">
                </div>

                <div class="mb-3">
                    <label for="password">contraseña</label>
                    <input id="password" name="password" class="form-control" type="password"
                        placeholder="******************">
                </div>

                <div class="mb-3">
                    <label for="confirm_password">Confirme su contraseña</label>
                    <input id="confirm_password" name="confirm_password" class="form-control" type="password"
                        placeholder="******************">
                </div>

                <div class="mb-3">
                    <label for="imagen">Selecciona imagen de perfil</label>
                    <input type="file" id="imagen" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    @endsection
