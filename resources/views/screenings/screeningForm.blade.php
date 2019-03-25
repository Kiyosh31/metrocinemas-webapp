@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Agregar Funcion</h1>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar Funcion</h3>
            </div>
            <div class="card-body">
                @if(isset($movies))
                    <form action="{{ route('screenings.store') }}" method="POST">
                        @csrf
                        <div class="col-8 offset-2">
                            <div class="form-group">
                                <label class="form-label">Pelicula</label>
                                <select name="movie_id" class="form-control">
                                    @foreach($movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sala</label>
                                <input type="text" class="form-control" name="room_id" value="{{ old('room_id') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Inicio</label>
                                <input type="datetime-local" class="form-control" name="start" value="{{ old('start') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Termina</label>
                                <input type="datetime-local" class="form-control" name="finish" value="{{ old('finish') }}">
                            </div>

                            <div class="form-label">Estatus</div>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="status" value="1" checked>
                                        <div class="custom-control-label">Activo</div>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="status" value="0">
                                        <div class="custom-control-label">Inactivo</div>
                                    </label>
                            </div>

                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                        </div>
                    </div>
                    </form>
                @else
                    <form action="{{ route('screenings.store') }}" method="POST">
                        @csrf
                        <div class="col-8 offset-2">
                            <div class="form-group">
                                <label class="form-label">Pelicula</label>
                                <select name="movie_id" class="form-control">
                                    @foreach($movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sala</label>
                                <input type="text" class="form-control" name="room_id" value="{{ old('room_id') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Inicio</label>
                                <input type="datetime-local" class="form-control" name="start" value="{{ old('start') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Termina</label>
                                <input type="datetime-local" class="form-control" name="finish" value="{{ old('finish') }}">
                            </div>

                            <div class="form-label">Estatus</div>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="status" value="1" checked>
                                        <div class="custom-control-label">Activo</div>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="status" value="0">
                                        <div class="custom-control-label">Inactivo</div>
                                    </label>
                            </div>

                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                        </div>
                    </div>
                    </form>
            @endif
        </div>
    </div>
</div>
</div>
@endsection