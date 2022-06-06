@extends('hotel.plantilla')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/admin/usuarios.css') }}">
@endsection
@section('contenido')
    <div class="container">
        <table class="table align-middle">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Email del cliente</th>
                    <th scope="col">Precio pagado</th>
                    <th scope="col">Pensión seleccionada</th>
                    <th scope="col">Fecha de entrada</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Ver mas detalles</th>
                    <th scope="col">Anular reserva</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($hotel->rooms as $room)
                    @foreach ($room->clients as $reserva)
                        <tr class="text-center">
                            <td>{{ $reserva->nombre . ' ' . $reserva->apellidos }}</td>
                            <td>{{ $reserva->email }}</td>
                            <td>{{ $reserva->pivot->precio }}€</td>
                            <td>{{ $reserva->pivot->tipo_pension }}</td>
                            <td>{{ $reserva->pivot->fecha_entrada }}</td>
                            <td>{{ $reserva->pivot->fecha_salida }}</td>

                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#res_{{ $reserva->pivot->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                            @if($reserva->pivot->fecha_salida > \Carbon\Carbon::now())
                                <td><button class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                            @endif
                            <div class="modal fade" id="res_{{ $reserva->pivot->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Datos del cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            DNI:
                                            {{ $reserva->nif }}
                                            <br>
                                            <div><i class="bi bi-signpost"></i><u>Dirección:</u></div>
                                            C\
                                            {{ $reserva->client_direction->calle . ' nº ' . $reserva->client_direction->puerta . ' ' . $reserva->client_direction->patio . ' ' . $reserva->client_direction->ciudad . ' ' . $reserva->client_direction->cod_postal . ' (' . $reserva->client_direction->provincia . ')' }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{-- {{$hotel->links()}} --}}
        </div>
    </div>
@endsection
