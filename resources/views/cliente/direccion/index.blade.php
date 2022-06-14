@extends("cliente.plantilla")
@section('contenido')
    <div class="container">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Direccion</div>
            <div class="card-body table-responsive">
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
                        <td>{{$client->client_direction->calle}}</td>
                        <td>{{$client->client_direction->patio}}</td>
                        <td>{{$client->client_direction->puerta}}</td>
                        <td>{{$client->client_direction->cod_postal}}</td>
                        <td>{{$client->client_direction->provincia}}</td>
                        <td>{{$client->client_direction->ciudad}}</td>
                        <td>{{$client->client_direction->pais}}</td>
                        <td><a href="{{route("direccion-cliente.edit", $client->client_direction)}}"><i class="bi bi-pencil-square"></i></a></td>
                      </tr>
                    </tbody>
                  </table>

            </div>
          </div>
    </div>
@endsection
