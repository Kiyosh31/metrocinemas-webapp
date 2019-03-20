@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Listado de peliculas</h1>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Busqueda de pelicula</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Director</th>
                                <th scope="col">Cast</th>
                                <th scope="col">Clasificacion</th>
                                <th scope="col">Duracion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->description }}</td>
                                <td>{{ $movie->director }}</td>
                                <td>{{ $movie->cast }}</td>
                                <td>{{ $movie->clasification }}</td>
                                <td>{{ $movie->duration_min }} minutos</td>
                                <td>
                                    <a href="{{ route('movies.edit', $movie->id)}}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
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