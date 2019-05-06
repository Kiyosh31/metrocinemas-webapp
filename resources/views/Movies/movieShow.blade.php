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
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->cast }}</td>
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
                        <div class="modal fade" id="deleteModal-{{ $movie->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Esta seguro de eliminar?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Desea eliminar este elemento?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <h3 class="card-title">Covers de la pelicula</h3>
                <div class="ml-auto">
                    <a href="{{ route('movies.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Agregar cover</a>
                </div>
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
                        <img src="" alt="{{ $photo->hashed }}" title="{{ $photo->name }}" class="h-8">
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
                @if ($photos->isNotEmpty())
                <tfoot>
                    <tr>
                        <td colspan="3" align="right">
                            <div class="ml-auto">
                                <form action="{{ action('MovieController@destroyAllImages', $movie->id) }}"
                                    method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Eliminar todo</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection