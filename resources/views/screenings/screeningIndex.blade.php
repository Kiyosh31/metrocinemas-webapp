@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Proyecciones</h3>
                <div class="ml-auto">
                    <a href="{{ route('screenings.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Agregar proyeccion</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Sala</th>
                                <th>Inicio</th>
                                <th>Termina</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($screenings as $sc)
                            <tr>
                                <td>
                                    {{ $sc->id }}
                                </td>
                                <td>{{ $sc->movie->title }}</td>
                                <td>{{ $sc->room->name }}</td>
                                <td>{{ $sc->start }}</td>
                                <td>{{ $sc->finish }}</td>
                                <td>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('screenings.edit', $sc->id) }}">
                                                            Editar
                                                          </a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('screenings.destroy', $sc->id) }}" method="POST">
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