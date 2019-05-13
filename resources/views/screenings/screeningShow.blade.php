@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Proyeccion modificada</h3>
                <div class="ml-auto">
                    <a href="{{ route('screenings.index') }}" class="btn btn-sm btn-primary"><i
                            class="fa fa-arrow-left"></i> Regresar</a>
                </div>
            </div>

            <div class="card-body">
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
                        <tr>
                            <td>{{ $screening->id }}</td>
                            @foreach($screening->movie as $movie)
                                <td>{{ $movie->title }}</td>
                                <td>{{ $screening->auditorium_id }}</td>
                                <td>{{ $movie->pivot->screening_start }}</td>
                                <td>{{ $movie->pivot->screening_finish }}</td>
                            @endforeach

                            <td>
                                <a href="{{ route('screenings.edit', $screening->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                @can('delete', $screening)
                                <form action="{{ route('screenings.destroy', $screening->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{ $screening->id }}" tabindex="-1" role="dialog">
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
                                        <form action="{{ route('screenings.destroy', $screening->id) }}" method="POST">
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
@endsection