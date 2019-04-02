@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Auditorios</h3>
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
                            @foreach($auditoriums as $auditorium)
                            <tr>
                                <td>{{ $auditorium->id }}</td>
                                <td>{{ $auditorium->name }}</td>
                                <td>{{ $auditorium->seats_no }}</td>
                                <td>
                                    <a href="{{ route('auditoriums.show', $auditorium->id) }}">Detalle</a>
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