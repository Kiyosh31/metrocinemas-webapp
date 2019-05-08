@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de peliculas</h3>
                <div class="ml-auto">
                    <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Agregar pelicula</a>
                </div>
            </div>

            <div class="card-body">
            <form action="{{ route('movies.index') }}" method="GET">
                <label for="filter_title">Buscar pelicula</label>
                <input type="text" name="filter_title">
                <button type="submit" class="btn btn-primary ml-auto">Buscar</button>
            </form>
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
                        @if($movies->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            No se encontraron peliculas
                        </div>
                        @else @foreach($movies as $movie)
                        <tr>
                            <td>
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-info">
                                    {{ $movie->id }}
                                </a>
                            </td>
                            <td>{{ $movie->upper_title }}</td>
                            <td>{{ $movie->upper_description }}</td>
                            <td>{{ $movie->upper_director }}</td>
                            <td>{{ $movie->upper_cast }}</td>
                            <td>{{ $movie->clasification }}</td>
                            <td>{{ $movie->category }}</td>
                            <td>{{ $movie->duration_min }} minutos</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('movies.edit', $movie->id) }}">
                                            Editar
                                        </a>
                                        @can('delete', $movie)
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal-{{ $movie->id }}">
                                                Eliminar
                                            </a> 
                                        @endcan
                                    </div>
                                </div>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> @endforeach @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection