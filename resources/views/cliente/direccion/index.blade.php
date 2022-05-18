@extends("cliente.plantilla")
@section('contenido')
    <div class="container">
        <div class="card text-dark bg-light mb-3"">
            <div class="card-header text-center">Direccion</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Calle</th>
                        <th scope="col">Patio</th>
                        <th scope="col">Puerta</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">País</th>
                        <th scope="col">Editar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$direccion->calle}}</td>
                        <td>{{$direccion->patio}}</td>
                        <td>{{$direccion->puerta}}</td>
                        <td>{{$direccion->cod_postal}}</td>
                        <td>{{$direccion->provincia}}</td>
                        <td>{{$direccion->ciudad}}</td>
                        <td>{{$direccion->pais}}</td>
                        <td><a href="{{route("direccion-cliente.edit", $direccion)}}"><i class="bi bi-pencil-square"></i></a></td>
                      </tr>
                    </tbody>
                  </table>

            </div>
          </div>
    </div>
@endsection
