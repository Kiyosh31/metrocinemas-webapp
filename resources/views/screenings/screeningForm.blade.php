@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($screening) ? 'Modificar' : 'Agregar' }} Proyeccion</h3>
            </div>
            <div class="card-body">
                @if(isset($screening))
                <form action="{{ route('screenings.update', $screening->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">@csrf
                    <div class="col-8 offset-2">
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
                            <label class="form-label">Sala</label> @if($auditoriums->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay auditorios" disabled> @endif
                            <select name="movie_id" class="form-control">
                                @foreach($auditoriums as $auditorium)
                                    <option value="{{ $auditorium->id }}">{{ $auditorium->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Inicio</label>
                            <input type="datetime-local" class="form-control" name="start" value="{{ old('start', date('Y-m-d')) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termina</label>
                            <input type="datetime-local" class="form-control" name="finish" value="{{ $screening->finish ?? '' }}{{ old('finish') }}">
                        </div>

                        @if($movies->isEmpty() || $auditoriums->isEmpty())
                        <button type="submit" class="btn btn-primary ml-auto" disabled>Aceptar</button> @else
                        <button type="submit" class="btn btn-primary ml-auto">Aceptar</button> @endif
                    </div>
            </div>
            </form>
            @else
            <form action="{{ route('screenings.store') }}" method="POST">
                @csrf
                <div class="col-8 offset-2">
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
                        <label class="form-label">Sala</label> @if($auditoriums->isEmpty())
                        <input type="text" class="form-control" placeholder="No hay salas" disabled> @else
                        <select name="room_id" class="form-control">
                            @foreach($auditoriums as $auditorium)
                                <option value="{{ $auditorium->id }}">{{ $auditorium->name }}</option>
                            @endforeach
                        </select> @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Inicio</label>
                        <input type="datetime-local" class="form-control" name="start" value="{{ $screening->start ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Termina</label>
                        <input type="datetime-local" class="form-control" name="finish" value="{{ $screening->finish ?? '' }}">
                    </div>

                    @if($movies->isEmpty() || $auditoriums->isEmpty())
                    <button type="submit" class="btn btn-primary ml-auto" disabled>Aceptar</button> @else
                    <button type="submit" class="btn btn-primary ml-auto">Aceptar</button> @endif
                </div>
        </div>
        </form>
        @endif
    </div>
</div>
</div>
</div>
@endsection