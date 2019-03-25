@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Listado de funciones</h1>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de funciones</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            @if($screenings->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                No se encontraron peliculas
                            </div>
                            @else @foreach($screenings as $screening)
                            <tr>
                                <td>{{ $screening->id }}</td>
                                <td>{{ $screening->movie_id }}</td>
                                <td>{{ $screening->room_id }}</td>
                                <td>{{ $screening->start }}</td>
                                <td>{{ $screening->finish }}</td>
                            </tr>
                            @endforeach @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection