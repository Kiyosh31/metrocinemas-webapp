@extends('layouts.tabler')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de usuarios no verificados</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Enviar correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->role == 'admin')
                                    <td>Administrador</td>
                                @else
                                    <td>Empleado</td>
                                @endif
                                
                                <td>
                                    <a href="{{ action('VerifyUserController@sendMail', $user->id) }}" class="btn btn-sm btn-success">Enviar Correo</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection