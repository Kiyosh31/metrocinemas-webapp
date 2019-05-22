@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($screening) ? 'Modificar' : 'Agregar' }} Proyeccion</h3>
            </div>
            <div class="card-body">
                @include('partials.formErrors')
                @if(isset($screening))
                <form action="{{ route('screenings.update', $screening->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Pelicula</label>
                            @if($movies->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay peliculas" disabled>
                            @else
                            <select name="movie_id" class="form-control">
                                @foreach($movies as $movie)
                                <option value="{{ $movie->id }}">{{ $movie->id . '. ' . $movie->title }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Sala</label> @if($auditoriums->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay salas" disabled>
                            @else
                            <select name="auditorium_id" class="form-control">
                                @foreach($auditoriums as $ad)
                                <option value="{{ $ad->id }}"
                                    {{ ($ad->id == $screening->auditorium_id) ? 'selected': '' }}>
                                    {{ $ad->id . '. ' . $ad->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Inicio</label>
                            <input type="datetime-local" class="form-control" name="screening_start">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termina</label>
                            <input type="datetime-local" class="form-control" name="screening_finish">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto"
                                {{ $movies->isEmpty() || $auditoriums->isEmpty() ? 'disabled': '' }}>Aceptar</button>
                            <a href="{{ route('screenings.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>

                    </div>
                </form>
                @else
                <form action="{{ route('screenings.store') }}" method="POST">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Pelicula</label>
                            @if($movies->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay peliculas" disabled>
                            @else
                            <select name="movie_id" class="form-control">
                                @foreach($movies as $movie)
                                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Sala</label> @if($auditoriums->isEmpty())
                            <input type="text" class="form-control" placeholder="No hay salas" disabled>
                            @else
                            <select name="auditorium_id" class="form-control">
                                @foreach($auditoriums as $auditorium)
                                <option value="{{ $auditorium->id }}">{{ $auditorium->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Inicio</label>
                            <input type="datetime-local" class="form-control" name="screening_start">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termina</label>
                            <input type="datetime-local" class="form-control" name="screening_finish">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto"
                                {{ $movies->isEmpty() || $auditoriums->isEmpty() ? 'disabled': '' }}>Aceptar</button>
                            <a href="{{ route('screenings.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>

                    </div>
            </div>
            </form>
            @endif
        </div>
    </div>
</div>
</div>
@endsection