@extends('layouts.tabler')
@section('content')
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                        <tr>
                            <th class="text-center w-1"><i class="icon-people"></i></th>
                            <th>Pelicula</th>
                            <th>Proyeccion</th>
                            <th class="text-center">Auditorio</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($screenings->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            No se encontraron proyecciones
                        </div>
                        @else
                        @foreach ($screenings as $sc)
                        @foreach ($sc->movie as $movie)
                        <tr>
                            <td class="text-center">
                                <div class="avatar d-block">
                                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($photo->hashed)) }}"
                                    alt="{{ $photo->hashed }}" style="height: 50px; width: 50px;"> --}}
                                </div>
                            </td>
                            <td>
                                <div>{{ $movie->title }}</div>
                                <div class="small text-muted">
                                    {{ $movie->clasification }} -
                                    {{ $movie->category }}
                                </div>
                            </td>
                            <td>
                                <div>{{ $movie->pivot->screening_start }} -
                                    {{ $movie->pivot->screening_finish }}</div>
                            </td>
                            <td class="text-center">
                                <div>{{ $sc->auditorium_id }}</div>
                            </td>
                            <td class="text-center">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                            class="fa fa-bars"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('screenings.edit', $sc->id) }}" class="dropdown-item"><i
                                                class="dropdown-icon fe fe-tag"></i> Editar </a>
                                        @if (Auth::user()->role == 'admin')
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#deleteModal-{{ $sc->id }}">
                                            <i class="dropdown-icon fa fa-trash"></i>Eliminar
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{ $sc->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Esta seguro de eliminar?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Desea eliminar este elemento?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('screenings.destroy', $sc->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection