@extends('layouts.app')

@section('content')
    <h1>Peliculas</h1>
    <div class="row">
        <div class="col-8 offset-2">
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
                @foreach($movies as $movie)
                    <tr class="table-success">
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->cast }}</td>
                        <td>{{ $movie->clasification }}</td>
                        <td>{{ $movie->duration_min }} minutos</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection