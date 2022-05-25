@extends('cliente.plantilla')
@section('head')
    <script defer src="{{ asset('js/pago/sumprice.js') }}"></script>
@endsection
@section('contenido')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <div class="h1 text-center">Su reserva en {{ $habitacion->hotel->nombre }}</div>
            </div>

            <input hidden value="{{ $habitacion->id }}" id="id_habitacion">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between bg-light lh-sm">
                            <img src="/imgs/{{ $habitacion->images_rooms[0]->img_path }}"
                                class="rounded-pill col-3 img-fluid">
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light lh-sm">
                            <div class="py-4">
                                <strong>Habitación en:</strong> {{ $habitacion->hotel->nombre }}
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="p-3">
                                <h6 class="my-0"><strong>Precio por noche:</strong></h6>
                            </div>
                            <div class="p-3">
                                <span>
                                    {{ $habitacion->precio_noche * $noches }}
                                </span>€
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="p-3">
                                <h6 class="my-0"><strong>Precio por extras:</strong></h6>
                            </div>
                            <div class="p-3">
                                <span id="extras">0</span>€
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="p-3">
                                <h6 class="my-0"><strong>Precio Total:</strong></h6>
                            </div>
                            <div class="p-3">
                                <span id="precio">{{ $habitacion->precio_noche * $noches
                                }}</span>€
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Resumen de Reserva</h4>

                    <div class="row g-3">
                        <div class="col-12 p-3 text-center element-white border rounded-3">
                            <div class="col-auto h5 pb-2">Fecha de entrada: <mark>{{ $fecha_entrada }}</mark></div>
                            <div class="col-auto h5 pb-2">Fecha de salida: <mark>{{ $fecha_salida }}</mark></div>
                            <div class="col-auto h5">Número de noches: <mark id="noches">{{ $noches }}</mark></div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- selectores de pension -->
                    <h4 class="mb-3">Selecciona el tipo de pensión:</h4>
                    <div class="my-3 pensiones">
                        <div class="form-check">
                            <input id="SP" name="pension" value="SP" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="SP">Sin Pensión</label>
                        </div>
                        <div class="form-check">
                            <input id="MP" value="MP" name="pension" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="MP">Media Pensión</label>
                        </div>
                        <div class="form-check">
                            <input id="PC" value="PC" name="pension" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="PC">Pensión Completa</label>
                        </div>
                        <div class="form-check">
                            <input id="HD" value="HD" name="pension" type="radio" class="form-check-input" required="">
                            <label class="form-check-label" for="HD">Alojamiento y Desayuno</label>
                        </div>
                    </div>
                    <!-- selectores de pension -->

                    <hr class="my-4">

                    <form action="{{ route('reservar.store') }}" method="POST">
                        @csrf
                        <input name="room_id" value="{{ $habitacion->id }}" hidden>
                        <input type="date" name="fecha_entrada_form" value="{{ $fecha_entrada }}" hidden>
                        <input type="text" name="fecha_salida_form" value="{{ $fecha_salida }}" hidden>
                        <input type="text" name="noches_form" value="{{ $noches }}" hidden>
                        <input name="precio_form" id="precio_form" hidden>
                        <input name="pension_form" id="pension_form" value="SP" hidden>
                        <button type="submit" class="w-100 btn btn-primary btn-lg">Reservar</button>
                    </form>

                </div>
            </div>
        </main>
    </div>
@endsection
