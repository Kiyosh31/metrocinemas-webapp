@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reservacion Modificada</h3>
                <div class="ml-auto">
                    <a href="{{ route('reservations.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>  Regresar</a>
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
                            <th>Apellido del cliente</th>
                            <th>Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user_id }}</td>
                            <td>{{ $reservation->screening_id }}</td>
                            <td>{{ $reservation->movie_id }}</td>
                            <td>{{ $reservation->client_name }}</td>
                            <td>{{ $reservation->client_last_name }}</td>
                            <td>{{ $reservation->paid }}</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('reservations.edit', $reservation->id) }}">
                                                Editar
                                              </a> @can('delete', $rv)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal-{{ $reservations->id }}">
                                            Eliminar
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
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