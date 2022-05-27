@extends('cliente.plantilla')
@section('contenido')
    <div class="container">
        <div class="container mt-5 mb-5">

            <div class="row d-flex justify-content-center reserva p-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="invoice p-5">

                            <h5><i class="bi bi-balloon"></i>Disfruta de tu reserva, {{ $cliente->nombre }}<i class="bi bi-balloon"></i></h5>

                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Fecha de entrada</span>
                                                    <span>{{ $reservas[0]->fecha_entrada }}</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Fecha de salida</span>
                                                    <span>{{ $reservas[0]->fecha_salida }}</span>

                                                </div>
                                            </td>


                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Noches</span>
                                                    <span>{{ $reservas[0]->num_noches }}</span>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="row d-flex justify-content-center">

                                <div class="col-md-5">

                                    <table class="table table-borderless">

                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left">
                                                        <span class="text-muted">Dirección del hotel</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span> C\
                                                            {{ $habitacion->hotel->hotel_directions->calle . ' nº ' . $habitacion->hotel->hotel_directions->puerta . ' ' . $habitacion->hotel->hotel_directions->patio . ' ' . $habitacion->hotel->hotel_directions->ciudad . ' ' . $habitacion->hotel->hotel_directions->cod_postal . ' (' . $habitacion->hotel->hotel_directions->provincia . ')' }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left">
                                                        <span class="font-weight-bold">Total</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">{{ $reservas[0]->precio }}€</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('inicio') }}"><button class="btn btn-info">Volver al inicio</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
