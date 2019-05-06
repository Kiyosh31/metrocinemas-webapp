@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Auditorios</h3>
                <div class="ml-auto">
                    <a href="{{ route('auditoriums.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Agregar Auditorio</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
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
                            @foreach($auditoriums as $auditorium)
                            <tr>
                                <td>
                                    <a href="{{ route('auditoriums.show', $auditorium->id) }}" class="btn btn-sm btn-info">
                                        {{ $auditorium->id }}
                                    </a>
                                </td>
                                <td>{{ $auditorium->name }}</td>
                                <td>{{ $auditorium->seats_no }}</td>
                                <td>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('auditoriums.edit', $auditorium->id) }}">
                                                            Editar
                                                          </a> @can('delete',
                                            $auditorium)
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal-{{ $auditorium->id }}">
                                                                  Eliminar
                                                          </a> @endcan
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection