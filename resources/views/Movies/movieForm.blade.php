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
                @if(isset($movie))
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        @csrf
                        
                        <div class="col-8 offset-2">
                            <div class="form-group">
                                <label class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="title" placeholder="Titulo" value="{{ isset($movie) ? $movie->title : '' }}">
                            </div>

                            <div class="form-group">
                                    <label class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" name="description" placeholder="Descripcion" value="{{ $movie->description ?? '' }}">
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label">Director</label>
                                    <input type="text" class="form-control" name="director" placeholder="Director" value="{{ $movie->director ?? '' }}">
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label">Reparto</label>
                                    <input type="text" class="form-control" name="cast" placeholder="Reparto" value="{{ $movie->cast ?? '' }}">
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label">Clasificacion</label>
                                    <input type="text" class="form-control" name="clasification" placeholder="Clasificacion" value="{{ $movie->clasification ?? '' }}">
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label">Duracion en minutos</label>
                                    <input type="text" class="form-control" name="duration" placeholder="Duracion" value="{{ $movie->duration_min ?? '' }}">
                                </div>
    
                                <div class="form-label">Estatus</div>
                                <div class="custom-controls-stacked">
                                    @if($movie->active == 1)
                                    <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status" value="1" checked>
                                            <div class="custom-control-label">Activo</div>
                                        </label>
                                    <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status" value="0">
                                            <div class="custom-control-label">Inactivo</div>
                                    </label>
                                    @else
                                    <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status" value="1">
                                            <div class="custom-control-label">Activo</div>
                                        </label>
                                    <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status" value="0" checked>
                                            <div class="custom-control-label">Inactivo</div>
                                    </label>
                                    @endif
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
                                <input type="text" class="form-control" name="title" placeholder="Titulo">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="description" placeholder="Descripcion">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Director</label>
                                <input type="text" class="form-control" name="director" placeholder="Director">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Reparto</label>
                                <input type="text" class="form-control" name="cast" placeholder="Reparto">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Clasificacion</label>
                                <input type="text" class="form-control" name="clasification" placeholder="Clasificacion">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Duracion en minutos</label>
                                <input type="text" class="form-control" name="duration" placeholder="Duracion">
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