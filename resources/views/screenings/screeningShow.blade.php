@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Proyeccion modificada</h3>
                <div class="ml-auto">
                    <a href="{{ route('screenings.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>  Regresar</a>
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
                            <td>{{ $screening->title }}</td>
                            <td>{{ $screening->name }}</td>
                            <td>{{ $screening->screening_start }}</td>
                            <td>{{ $screening->screening_finish }}</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('screenings.edit', $screening->id) }}">
                                                Editar
                                              </a> @can('delete', $screening)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal-{{ $screening->id }}">
                                            Eliminar
                                        </a> @endcan
                                    </div>
                                </div>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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