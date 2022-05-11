@extends("hotel.plantilla")
@section('contenido')
    <div class="container">
        <h2 class="text-center">Modifique sus datos</h2>
        <div class="d-flex justify-content-center">
            <form method="POST" action="{{ route('cuenta.update', Auth::guard('hotel')->user()->id) }}" enctype="multipart/form-data">
                @method("put")
                @csrf
                <div class="d-flex justify-content-center">
                    <img src="{{ $user->img_path }}" class="img-fluid rounded" width="100px">
                </div>
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" class="form-control"
                        value="{{ Auth::guard('hotel')->user()->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion"
                        class="form-control">{{ Auth::guard('hotel')->user()->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="email">email</label>
                    <input id="email" name="email" class="form-control"
                        value="{{ Auth::guard('hotel')->user()->email }}">
                </div>

                <div class="mb-3">
                    <label for="current_password">contraseña actual</label>
                    <input id="current_password" name="current_password" class="form-control" type="password"
                        placeholder="******************">
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
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Eliminar cuenta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea eliminar su cuenta?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Esta acción es irreversible y puede conllevar perdidas de reservas si todavía están activas
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form method="POST" action="{{route("cuenta.destroy", Auth::guard('hotel')->user()->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Sí, eliminar cuenta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
