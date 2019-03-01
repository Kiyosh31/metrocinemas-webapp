@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>
                <p>
                    Nombre {{$name}} {{$last_name}}
                </p>
                <p>
                    nombre completo: {{$complete_name}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection