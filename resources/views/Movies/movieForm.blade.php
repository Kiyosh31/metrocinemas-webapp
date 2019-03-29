@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Agregar pelicula</h1>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar pelicula</h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif @if(isset($movie))
                <form action="{{ route('movies.update', $movie->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH"> @csrf

                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="title" value="{{ $movie->title ?? '' }}{{ old('title') }}">                            @if ($errors->has('name'))
                            <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="description" value="{{ $movie->description ?? '' }}{{ old('description') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Director</label>
                            <input type="text" class="form-control" name="director" value="{{ $movie->director ?? '' }}{{ old('director') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Reparto</label>
                            <input type="text" class="form-control" name="cast" value="{{ $movie->cast ?? '' }}{{ old('cast') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Clasificacion</label>
                            <select name="clasification" class="form-control">
                                <option value="aa {{ old('clasification') }}">AA</option>
                                <option value="a {{ old('clasification') }}">A</option>
                                <option value="b {{ old('clasification') }}">B</option>
                                <option value="b15 {{ old('clasification') }}">B15</option>
                                <option value="c {{ old('clasification') }}">C</option>                                                                                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select name="category" class="form-control">
                                <option value="Comedia {{ old('category') }}">Comedia</option>
                                <option value="Sci-Fi {{ old('category') }}">Sci-Fi</option>
                                <option value="Horror {{ old('category') }}">Horror</option>
                                <option value="Romance {{ old('category') }}">Romance</option>
                                <option value="Accion {{ old('category') }}">Accion</option>
                                <option value="Thriller {{ old('category') }}">Thriller</option>
                                <option value="Drama {{ old('category') }}">Drama</option>
                                <option value="Misterio {{ old('category') }}">Misterio</option>
                                <option value="Crimen {{ old('category') }}">Crimen</option>
                                <option value="Animacion {{ old('category') }}">Animacion</option>
                                <option value="Aventura {{ old('category') }}">Aventura</option>
                                <option value="Fantasia {{ old('category') }}">Fantasia</option>
                                <option value="Comedia Romantica {{ old('category') }}">Comedia romantica</option>
                                <option value="Accion Comedia {{ old('category') }}">Accion Comedia</option>
                                <option value="Super Heores {{ old('category') }}">Super heroes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Duracion en minutos</label>
                            <input type="number" class="form-control" name="duration_min" value="{{ $movie->duration_min ?? '' }}{{ old('duration_min') }}">
                        </div>
                        <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                    </div>
                </form>
                @else
                <form action="{{ route('movies.store') }}" method="POST">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"> @if ($errors->has('title'))
                            <span class="alert alert-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Director</label>
                            <input type="text" class="form-control" name="director" value="{{ old('director') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Reparto</label>
                            <input type="text" class="form-control" name="cast" value="{{ old('cast') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Clasificacion</label>
                            <select name="clasification" class="form-control">
                                <option value="aa {{ old('clasification') }}">AA</option>
                                <option value="a {{ old('clasification') }}">A</option>
                                <option value="b {{ old('clasification') }}">B</option>
                                <option value="b15 {{ old('clasification') }}">B15</option>
                                <option value="c {{ old('clasification') }}">C</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select name="category" class="form-control">
                                <option value="Comedia {{ old('category') }}">Comedia</option>
                                <option value="Sci-Fi {{ old('category') }}">Sci-Fi</option>
                                <option value="Horror {{ old('category') }}">Horror</option>
                                <option value="Romance {{ old('category') }}">Romance</option>
                                <option value="Accion {{ old('category') }}">Accion</option>
                                <option value="Thriller {{ old('category') }}">Thriller</option>
                                <option value="Drama {{ old('category') }}">Drama</option>
                                <option value="Misterio {{ old('category') }}">Misterio</option>
                                <option value="Crimen {{ old('category') }}">Crimen</option>
                                <option value="Animacion {{ old('category') }}">Animacion</option>
                                <option value="Aventura {{ old('category') }}">Aventura</option>
                                <option value="Fantasia {{ old('category') }}">Fantasia</option>
                                <option value="Comedia Romantica {{ old('category') }}">Comedia romantica</option>
                                <option value="Accion Comedia {{ old('category') }}">Accion Comedia</option>
                                <option value="Super Heores {{ old('category') }}">Super heroes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Duracion en minutos</label>
                            <input type="number" class="form-control" name="duration_min" value="{{ old('duration_min') }}">
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