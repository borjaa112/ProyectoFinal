@extends('cliente.plantilla')
@section('contenido')
    <div class="container">

        @forelse ($client as $reserva)
            <div class="d-flex justify-content-center">
                <div class="card mt-3 col-10 justify-content-center">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/imgs/{{ $reserva->images_rooms[0]->img_path }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">#{{ $reserva->pivot->id }} {{ $reserva->hotel->nombre }}</h5>
                                <div>Fecha de entrada <i class="bi bi-arrow-right"></i>
                                    <u>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reserva->pivot->fecha_entrada)->format('d-m-Y') }}</u>
                                </div>
                                <div>Fecha de salida <i class="bi bi-arrow-right"></i>
                                    <u>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $reserva->pivot->fecha_salida)->format('d-m-Y') }}</u>
                                </div>
                                <div>Precio pagado <strong>{{ $reserva->pivot->precio }}€</strong></div>
                                <div class="text-muted">Reserva realizada
                                    {{ $reserva->pivot->created_at->diffForHumans() }}</div>
                                @if ($reserva->pivot->fecha_entrada > \Carbon\Carbon::now())
                                    <div class="d-flex align-items-end justify-content-end">
                                        <form action="{{ route('reservar.destroy', $reserva->pivot) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning">Cancelar reserva</button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12 text-center">
                        <img src="{{asset("imgs/reserva/sin-reservas.png")}}" class="img-fluid mb-4 mr-3">
                        <h3><strong>No tienes reservas</strong></h3>
                        <h4>Busca y reserva, hay muchos destinos esperándote :)</h4>
                        <a href="{{route("inicio")}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Volver al inicio</a>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="d-flex justify-content-center">
            {{ $client->links() }}
        </div>

    </div>
@endsection
