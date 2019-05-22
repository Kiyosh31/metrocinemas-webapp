@extends('layouts.tabler')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reservacion Modificada</h3>
                <div class="ml-auto">
                    <a href="{{ route('reservations.index') }}" class="btn btn-sm btn-primary"><i
                            class="fa fa-arrow-left"></i> Regresar</a>
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
                            <th>Asientos</th>
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
                            <td>{{ $reservation->upper_client_name . ' ' . $reservation->upper_client_last_name }}</td>
                            <td>{{ $imploded }}</td>
                            <td>{{ '$ ' . $reservation->paid }}</td>

                            <td>
                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                    class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                @can('delete', $reservation)
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection