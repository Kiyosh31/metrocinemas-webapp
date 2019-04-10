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
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($auditoriums as $auditorium)
                            <tr>
                                <td>
                                    {{ $auditorium->id }}
                                </td>
                                <td>{{ $auditorium->name }}</td>
                                <td>{{ $auditorium->seats_no }}</td>
                                <td>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('auditoriums.edit', $auditorium->id) }}">
                                                            Editar
                                                          </a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('auditoriums.destroy', $auditorium->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE"> @csrf
                                                <button type="submit" class="dropdown-item">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection