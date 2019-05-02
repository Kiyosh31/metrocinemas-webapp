@extends('layouts.app')

@section('content')

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu cuenta de correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link se ha enviado a tu cuenta de correo') }}
                        </div>
                    @endif

                    {{ __('Antes de proseguir revisa tu cuenta de correo para el link de verificacion.') }}
                    {{ __('Si no has recibido el mail') }}, <a href="{{ route('verification.resend') }}">{{ __('has click aqui para solicitar otro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
