@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de reservaciones</h3>
                <div class="ml-auto">
                    <a href="{{ route('reservations.create') }}" class="btn btn-sm btn-primary"><i
                            class="fa fa-plus"></i> Agregar reservacion</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empleado</th>
                            <th>Proyeccion</th>
                            <th>Pelicula</th>
                            <th>Nombre del cliente</th>
                            <th>Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($reservations->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            No se encontraron reservaciones
                        </div>
                        @else @foreach($reservations as $rv)
                        <tr>
                            <td>
                                <a href="{{ route('reservations.show', $rv->id) }}" class="btn btn-sm btn-info">
                                    {{ $rv->id }}
                                </a>
                            </td>
                            <td>{{ $rv->user->username }}</td>
                            <td>{{ $rv->screening_id }}</td>
                            <td>{{ $rv->movie->title }}</td>
                            <td>{{ $rv->upper_client_name . ' ' . $rv->upper_client_last_name }}</td>
                            <td>{{ '$ ' . $rv->paid }}</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('reservations.edit', $rv->id) }}">
                                            <i class="dropdown-icon fe fe-tag"></i>Editar
                                        </a> @can('delete', $rv)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#deleteModal-{{ $rv->id }}">
                                            <i class="dropdown-icon fa fa-trash"></i>Eliminar
                                        </a> @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{ $rv->id }}" tabindex="-1" role="dialog">
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
                                        <form action="{{ route('reservations.destroy', $rv->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection