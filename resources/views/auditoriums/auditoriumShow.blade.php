@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Auditorio modificado</h3>
                <div class="ml-auto">
                    <a href="{{ route('movies.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>  Regresar</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Numero de asientos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $auditorium->id }}</td>
                            <td>{{ $auditorium->name }}</td>
                            <td>{{ $auditorium->seats_no }}</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('auditoriums.edit', $auditorium->id) }}">
                                                Editar
                                              </a> @can('delete', $auditorium)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal-{{ $auditorium->id }}">
                                            Eliminar
                                        </a> {{--
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="dropdown-item">Eliminar</button>
                                        </form> --}} @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{ $auditorium->id }}" tabindex="-1" role="dialog">
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
                                        <form action="{{ route('auditoriums.destroy', $auditorium->id) }}" method="POST">
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