@extends('layouts.tabler')
@section('content')

<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($reservation) ? 'Modificar' : 'Agregar' }} Reservacion</h3>
            </div>
            <div class="card-body">
                @include('partials.formErrors') @if(isset($reservation))
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH"> @csrf

                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Empleado</label>
                            <label type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}"
                                disabled>{{Auth::user()->username}}</label>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Proyeccion</label> @if($screenings->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay proyecciones" disabled> @else
                            <select name="screening_id" class="form-control">
                                @foreach($screenings as $sc)
                                @foreach($sc->movie as $movie)
                                <option value="{{ $sc->id }}">{{ $movie->title }} -
                                    {{ $movie->pivot->screening_start }} -
                                    {{ $movie->pivot->screening_finish }}
                                </option>
                                @endforeach
                                @endforeach
                            </select> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Apellido del cliente</label>
                            <input type="text" class="form-control" name="client_last_name"
                                value="{{ old('client_last_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monto a pagar</label>
                            <input type="number" step='0.1' class="form-control" name="paid" value="{{ old('paid') }}">
                        </div>

                        <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                    </div>
                </form>
                @else
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Empleado</label>
                            <label type="text" class="form-control" disabled>{{Auth::user()->username}}</label>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Proyeccion</label> @if($screenings->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay proyecciones" disabled> @else
                            <select name="screening_id" class="form-control">
                                @foreach($screenings as $sc)
                                @foreach($sc->movie as $movie)
                                <option value="{{ $sc->id }}">{{ $movie->title }} -
                                    {{ $movie->pivot->screening_start }} -
                                    {{ $movie->pivot->screening_finish }}
                                </option>
                                @endforeach
                                @endforeach
                            </select> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Apellido del cliente</label>
                            <input type="text" class="form-control" name="client_last_name"
                                value="{{ old('client_last_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Seleccione sus asientos</label>
                            <div class="col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="text-center">Pantalla</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-border">
                                    <ol>
                                        @for ($i = 0; $i < 15; $i++) <li>
                                            <input type="checkbox" name="seats[]" value="{{ $i+1 }}" onclick="calculate_total();">
                                            </li>
                                            @endfor
                                    </ol>
                                </div>
                                <div class="col-md-6 col-md-border">
                                    <ol start="16">
                                        @for ($j = 15; $j < 30; $j++) <li>
                                            <input type="checkbox" name="seats[]" value="{{ $j+1 }}" onclick="calculate_total();">
                                            </li>
                                            @endfor
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-lable">Pago total</label>
                            <input type="number" class="form-control" id="total" name="total" value="0"
                                disabled>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                            <a href="{{ route('reservations.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        @endif
    </div>
</div>
</div>
</div>


<script>
    function calculate_total() {
        // console.log(document.querySelectorAll('input[type="checkbox"]:checked').length);

        var total = 0;

        for(var i = 0; i < document.querySelectorAll('input[type="checkbox"]:checked').length; i++) {
            // console.log("entro");
            total += 30;
            // console.log(total);
        }

        document.getElementById("total").value = total;
    }
</script>

@endsection