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
                            <th class="text-center">Sala</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <div class="avatar d-block">
                                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($photo->hashed)) }}"
                                    alt="{{ $photo->hashed }}" style="height: 50px; width: 50px;"> --}}
                                </div>
                            </td>
                            <td>
                                <div>{{-- {{ $movie->title }} --}}</div>
                                <div class="small text-muted">
                                    {{-- {{ $screening->pivot->screening_start }} -
                                    {{ $screening->pivot->screening_finish }} --}}
                                </div>
                            </td>
                            <td>
                                <div class="clearfix">
                                    <div class="float-left">
                                        <strong>42%</strong>
                                    </div>
                                    <div class="float-right">
                                        <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                    </div>
                                </div>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-yellow" role="progressbar" style="width: 42%"
                                        aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="payment payment-visa"></i>
                            </td>
                            <td class="text-center">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fe fe-tag"></i> Editar </a>
                                        @if (Auth::user()->role == 'admin')
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-trash"></i> Eliminar </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection