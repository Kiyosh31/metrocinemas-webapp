@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($movie) ? 'Modificar' : 'Agregar' }} pelicula</h3>
            </div>
            <div class="card-body">
            @include('partials.formErrors') 
            @if(isset($movie))
                <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH"> 
                    @csrf

                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="title" placeholder="Escribe un titulo..."
                                value="{{ $movie->title ?? '' }}{{ old('title') }}"> 
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> 
                                @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descripcion</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="description"
                                placeholder="Escriba alguna descripcion...">{{ $movie->description ?? '' }}{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Director</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="director"
                                placeholder="Directores...">{{ $movie->director ?? '' }}{{ old('director') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Reparto</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="cast"
                                placeholder="Reparto...">{{ $movie->cast ?? '' }}{{ old('cast') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Clasificacion</label>
                            <select name="clasification" class="form-control">
                                <option value="AA" {{ 'AA' == $movie->clasification ? 'selected' : '' }}>AA</option>
                                <option value="A" {{ 'A' == $movie->clasification ? 'selected' : '' }}>A</option>
                                <option value="B" {{ 'B' == $movie->clasification ? 'selected' : '' }}>B</option>
                                <option value="B15" {{ 'B15' == $movie->clasification ? 'selected' : '' }}>B15</option>
                                <option value="C" {{ 'C' == $movie->clasification ? 'selected' : '' }}>C</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select name="category" class="form-control">
                                <option value="Comedia" {{ 'Comedia' == $movie->category ? 'selected' : '' }}>Comedia</option>
                                <option value="Sci-Fi" {{ 'Sci-Fi' == $movie->category ? 'selected' : '' }}>Sci-Fi</option>
                                <option value="Horror" {{ 'Horror' == $movie->category ? 'selected' : '' }}>Horror</option>
                                <option value="Romance" {{ 'Romance' == $movie->category ? 'selected' : '' }}>Romance</option>
                                <option value="Accion" {{ 'Accion' == $movie->category ? 'selected' : '' }}>Accion</option>
                                <option value="Thriller" {{ 'Thriller' == $movie->category ? 'selected' : '' }}>Thriller</option>
                                <option value="Drama" {{ 'Drama' == $movie->category ? 'selected' : '' }}>Drama</option>
                                <option value="Misterio" {{ 'Misterio' == $movie->category ? 'selected' : '' }}>Misterio</option>
                                <option value="Animacion" {{ 'Animacion' == $movie->category ? 'selected' : '' }}>Animacion</option>
                                <option value="Aventura" {{ 'Aventura' == $movie->category ? 'selected' : '' }}>Aventura
                                </option>
                                <option value="Fantasia" {{ 'Fantasia' == $movie->category ? 'selected' : '' }}>Fantasia
                                </option>
                                <option value="Comedia Romantica"{{ 'Comedia Romantica' == $movie->category ? 'selected' : '' }}>Comedia Romantica</option>
                                <option value="Accion Comedia"{{ 'Accion Comedia' == $movie->category ? 'selected' : '' }}>Accion Comedia</option>
                                <option value="Super Heores" {{ 'Super Heores' == $movie->category ? 'selected' : '' }}>Super Heores</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Duracion en minutos</label>
                            <input type="number" class="form-control" name="duration_min" placeholder="e.j 180"
                                value="{{ $movie->duration_min ?? '' }}{{ old('duration_min') }}">
                        </div>

                        <div class="form-group">
                            <label for="photos" class="form-label">Cargar de archivos</label>
                            {!! Form::file('photos[]', ['multiple' => true], ['class' => 'form-control'], ['enctype' => 'multipart/form-data']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>
                        
                    </div>
                </form>
                @else
                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" placeholder="Escribe un titulo..." name="title"
                                value="{{ old('title') }}"> @if ($errors->has('title'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span> @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descripcion</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="description"
                                placeholder="Escriba alguna descripcion...">{{ $movie->description ?? '' }}{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Director</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="director"
                                placeholder="Directores...">{{ $movie->director ?? '' }}{{ old('director') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Reparto</label>
                            <textarea rows="5" class="form-control" style="resize:none" name="cast"
                                placeholder="Reparto...">{{ $movie->cast ?? '' }}{{ old('cast') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Clasificacion</label>
                            <select name="clasification" class="form-control">
                                <option value="aa">AA</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="b15">B15</option>
                                <option value="c">C</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select name="category" class="form-control">
                                <option value="Comedia">Comedia</option>
                                <option value="Sci-Fi">Sci-Fi</option>
                                <option value="Horror">Horror</option>
                                <option value="Romance">Romance</option>
                                <option value="Accion">Accion</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Drama">Drama</option>
                                <option value="Misterio">Misterio</option>
                                <option value="Crimen">Crimen</option>
                                <option value="Animacion">Animacion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Comedia Romantica">Comedia romantica</option>
                                <option value="Accion Comedia">Accion Comedia</option>
                                <option value="Super Heores">Super heroes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Duracion en minutos</label>
                            <input type="number" class="form-control" name="duration_min" placeholder="e.j 180"
                                value="{{ $movie->duration_min ?? '' }}{{ old('duration_min') }}">
                        </div>

                        <div class="form-group">
                            <label for="photos" class="form-label">Cargar de archivos</label>
                            {!! Form::file('photos[]', ['multiple' => true], ['class' => 'form-control'], ['enctype' => 'multipart/form-data']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                            <a href="{{ route('movies.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
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
@endsection