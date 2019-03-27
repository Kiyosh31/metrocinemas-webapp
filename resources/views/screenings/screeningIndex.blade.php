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
                                <th scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($screenings as $sc)
                            <tr>
                                <td>{{ $sc->id }}</td>
                                <td>{{ $sc->movie->title }}</td>
                                <td>{{ $sc->room->name }}</td>
                                <td>{{ $sc->start }}</td>
                                <td>{{ $sc->finish }}</td>
                                <td>
                                    <a href="{{ route('screenings.show', $sc->id) }}">Detalle</a>
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