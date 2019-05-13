@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Proyecciones</h3>
                <div class="ml-auto">
                    <a href="{{ route('screenings.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Agregar proyeccion</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Sala</th>
                                <th>Inicio</th>
                                <th>Termina</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($screenings->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                No se encontraron proyecciones
                            </div>
                            @else @foreach($screenings as $sc)
                            <tr>
                                <td>
                                    <a href="{{ route('screenings.show', $sc->id) }}" class="btn btn-sm btn-info">
                                        {{ $sc->id }}
                                    </a>
                                </td>
                                @foreach($sc->movie as $movie)
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $sc->auditorium_id }}</td>
                                    <td>{{ $movie->pivot->screening_start }}</td>
                                    <td>{{ $movie->pivot->screening_finish }}</td>
                                @endforeach
                                <td>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="dropdown"
                                            class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('screenings.edit', $sc->id) }}">
                                                Editar
                                            </a> @can('delete',
                                            $sc)
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal-{{ $sc->id }}">
                                                Eliminar
                                            </a> @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal-{{ $sc->id }}" tabindex="-1" role="dialog">
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
                                            <form action="{{ route('screenings.destroy', $sc->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE"> @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach @endif
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{ $screenings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection