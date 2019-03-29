@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalle de una proyeccion</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Pelicula</th>
                                <th scope="col">Sala</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Termina</th>
                                <th scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $screening->id }}</td>
                                <td>{{ $screening->movie->title }}</td>
                                <td>{{ $screening->room->name }}</td>
                                <td>{{ $screening->start }}</td>
                                <td>{{ $screening->finish }}</td>
                                <td>
                                    <a href="{{ route('screenings.edit', $screening->id)}}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('screenings.destroy', $screening->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE"> @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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