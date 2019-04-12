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
<form class="card">
    <div class="card-body">
        <h3 class="card-title">Editar Perfil</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required focus>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="{{ old('password') }}" required>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="text" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirmar contraseña" value="{{ old('password_confirmation') }}"
                        required>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-label">Tipo de empleado</div>
                <div class="custom-controls-stacked">
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="role" value="admin" checked>
                        <div class="custom-control-label">Administrador</div>
                    </label>
                    <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="role" value="emp">
                        <div class="custom-control-label">Empleado</div>
                    </label>
                </div>
            </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </div>
</form>
@endsection