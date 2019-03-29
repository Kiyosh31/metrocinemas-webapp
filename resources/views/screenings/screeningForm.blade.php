@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Agregar Proyeccion</h1>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar Proyeccion</h3>
            </div>
            <div class="card-body">
                @if(isset($screening))
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
                            <label class="form-label">Sala</label> @if($rooms->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay salas" disabled> @endif
                            <select name="movie_id" class="form-control">
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Inicio</label>
                            <input type="datetime-local" class="form-control" name="start" value="{{ $screening->start ?? '' }}{{ old('start') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termina</label>
                            <input type="datetime-local" class="form-control" name="finish" value="{{ $screening->finish ?? '' }}{{ old('finish') }}">
                        </div>

                        @if($movies->isEmpty() || $rooms->isEmpty())
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
                        <label class="form-label">Sala</label> @if($rooms->isEmpty())
                        <input type="text" class="form-control" placeholder="No hay salas" disabled> @else
                        <select name="room_id" class="form-control">
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select> @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Inicio</label>
                        <input type="datetime-local" class="form-control" name="start" value="{{ $screening->start ?? '' }}{{ old('start') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Termina</label>
                        <input type="datetime-local" class="form-control" name="finish" value="{{ $screening->finish ?? '' }}{{ old('finish') }}">
                    </div>

                    @if($movies->isEmpty() || $rooms->isEmpty())
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