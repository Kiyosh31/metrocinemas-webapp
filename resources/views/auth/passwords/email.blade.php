@extends('layouts.app') 
@section('content')
<div class="container">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="en" />
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#4188c9">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext') }}">
        <script src="{{ asset('./assets/js/require.min.js') }}"></script>
        <script>
            requirejs.config({
                                    baseUrl: '.'
                                });
        </script>
        <!-- Dashboard Core -->
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <!-- c3.js Charts Plugin -->
        <link href="{{ asset('assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/plugins/charts-c3/plugin.js') }} "></script>
        <!-- Google Maps Plugin -->
        <link href="{{ asset('assets/plugins/maps-google/plugin.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/plugins/maps-google/plugin.js') }}"></script>
        <!-- Input Mask Plugin -->
        <script src="{{ asset('assets/plugins/input-mask/plugin.js') }}"></script>
    </head>

    <body class="">
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col col-login mx-auto">
                            <div class="text-center mb-6">
                                <img src="./assets/brand/tabler.svg" class="h-6" alt="">
                            </div>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form class="card" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="card-body p-6">
                                    <div class="card-title">Olvidaste la contraseña</div>
                                    <p class="text-muted">Ingresa tu email y se te enviara un correo.</p>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Correo Electronico</label>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" aria-describedby="emailHelp"
                                            placeholder="Ingresa el correo..." value="{{ old('email') }}">                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Enviame la contraseña</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center text-muted">
                                Olvidalo, <a href="{{ route('login') }}">enviame de regreso</a> al login.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    {{--
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection