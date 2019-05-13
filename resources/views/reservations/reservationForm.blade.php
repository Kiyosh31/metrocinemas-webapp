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
                            <label type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" disabled>{{Auth::user()->username}}</label>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Proyeccion</label> @if($screenings->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay proyecciones" disabled> @else
                            <select name="screening_id" class="form-control">
                                                    @foreach($screenings as $sc)
                                                        <option value="{{ $sc->id }}">{{ $sc->auditorium_id }}</option>
                                                    @endforeach
                                                </select> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pelicula</label> @if($movies->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay peliculas" disabled> @else
                            <select name="movie_id" class="form-control">
                                                        @foreach($movies as $movie)
                                                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                                        @endforeach
                                                    </select> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Apellido del cliente</label>
                            <input type="text" class="form-control" name="client_last_name" value="{{ old('client_last_name') }}">
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
                            <label type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}" disabled>{{Auth::user()->username}}</label>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Proyeccion</label> @if($screenings->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay proyecciones" disabled> @else
                            <select name="screening_id" class="form-control">
                                                @foreach($screenings as $sc)
                                                    <option value="{{ $sc->id }}">{{ $sc->auditorium_id }}</option>
                                                @endforeach
                                            </select> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nombre del cliente</label>
                            <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Apellido del cliente</label>
                            <input type="text" class="form-control" name="client_last_name" value="{{ old('client_last_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monto a pagar</label>
                            <input type="number" step='0.1' class="form-control" name="paid" value="{{ old('paid') }}">
                        </div>

                        <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                    </div>
            </div>
            </form>
        </div>
        @endif
    </div>
</div>
</div>
</div>
@endsection