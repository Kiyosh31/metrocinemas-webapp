@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Auditorio modificado</h3>
                <div class="ml-auto">
                    <a href="{{ route('auditoriums.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>  Regresar</a>
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
                                <a href="{{ route('auditoriums.edit', $auditorium->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                @can('delete', $auditorium)
                                    <form action="{{ route('auditoriums.destroy', $auditorium->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                    </form>
                                @endcan
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