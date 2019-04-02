@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalle de una sala</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Numero de asientos</th>
                                <th scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $auditorium->id }}</td>
                                <td>{{ $auditorium->name }}</td>
                                <td>{{ $auditorium->seats_no }}</td>
                                <td>
                                    <a href="{{ route('auditoriums.edit', $auditorium->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('auditoriums.destroy', $auditorium->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE"> @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection