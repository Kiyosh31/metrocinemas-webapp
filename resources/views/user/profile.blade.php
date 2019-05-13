@extends('layouts.tabler') 
@section('content')

<div class="card card-profile">
    <div class="card-header" style="background-image: url(demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
    <div class="card-body text-center">
        <img class="card-profile-img" src="demo/faces/male/16.jpg">
        <h3 class="mb-3">{{ Auth::user()->username }}</h3>
        <p class="mb-4">
            {{ Auth::user()->role == 'admin' ? 'Administrador' : 'Empleado' }}
        </p>
    </div>
</div>
    @include('partials.formErrors')
<form class="card" action="{{ route('user.update', Auth::user()->id) }}" method="POST">
    <input type="hidden" name="_method" value="PATCH"> @csrf
    <div class="card-body">
        <h3 class="card-title">Editar Perfil</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ Auth::user()->username }}{{ old('username') }}"
                        required focus>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}{{ old('email') }}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="text" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirmar contraseña"
                        value="{{ old('password_confirmation') }}">
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </div>
</form>
@endsection