@extends('layouts.tabler') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($auditorium) ? 'Modificar' : 'Agregar' }} Auditorio</h3>
            </div>
            <div class="card-body">
                @include('partials.formErrors') 
                @if(isset($auditorium))
                    <form action="{{ route('auditoriums.update', $auditorium->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH"> @csrf

                        <div class="col-8 offset-2">
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $auditorium->name ?? '' }}{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Numero de asientos</label>
                                <input type="number" class="form-control" name="seats_no" value="{{ $auditorium->seats_no ?? '' }}{{ old('seats_no') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                                <a href="{{ route('auditoriums.show', $auditorium->id) }}" class="btn btn-danger ml-auto">Cancelar</a>
                            </div>
                        </div>
                    </form>
                @else
                <form action="{{ route('auditoriums.store') }}" method="POST">
                    @csrf
                    <div class="col-8 offset-2">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Numero de asientos</label>
                            <input type="number" class="form-control" name="seats_no" value="{{ old('seats_no') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                            <a href="{{ route('auditoriums.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                        </div>

                    </div>
            </div>
            </form>
            @endif
        </div>
    </div>
</div>
</div>
@endsection