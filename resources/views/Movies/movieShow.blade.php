@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pelicula Modificada</h3>
                <div class="ml-auto">
                    <a href="{{ route('movies.index') }}" class="btn btn-sm btn-primary"><i
                            class="fa fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
            @include('partials.formErrors')

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Director</th>
                            <th>Cast</th>
                            <th>Clasificacion</th>
                            <th>Categoria</th>
                            <th>Duracion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->upper_title }}</td>
                            <td>{{ $movie->upper_description }}</td>
                            <td>{{ $movie->upper_director }}</td>
                            <td>{{ $movie->upper_cast }}</td>
                            <td>{{ $movie->clasification }}</td>
                            <td>{{ $movie->category }}</td>
                            <td>{{ $movie->duration_min }} minutos</td>

                            <td>
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                @can('delete', $movie)
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Imagenes de la pelicula</h3>
            </div>
            @if($photos->isEmpty())
            <div class="alert alert-danger" role="alert">
                No hay covers ligados a esta pelicula
            </div>
            @endif
            <table class="table card-table table-vcenter">
                @foreach ($photos as $photo)
                <tr>
                    <td>
                        <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($photo->hashed)) }}"
                            alt="{{ $photo->hashed }}" title="{{ $photo->name }}" style="height: 50px; width: 50px;">
                    </td>
                    <td>
                        {{ $photo->name }}
                    </td>
                    <td>
                        <form action="{{ action('MovieController@destroyImage', $photo->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @if ($photos->isNotEmpty())
            <div class="card-footer">
                <div class="ml-auto pull-right">
                    <form action="{{ action('MovieController@destroyAllImages', $movie->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i> Eliminar todo</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row row-cards">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar imagenes</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="{{ action('MovieController@addPhoto', $movie->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="photos" class="form-label">Cargar archivos</label>
                        {!! Form::file('photos[]', ['multiple' => true], ['class' => 'form-control'], ['enctype' =>
                        'multipart/form-data']) !!}
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary ml-auto">Subir fotos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection