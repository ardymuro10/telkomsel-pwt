<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box mt-0">
        <div class="login-logo">
            <img src="{{ asset('img/logo.png') }}" height="130" width="130" style="margin-left: auto; margin-right:auto; display:block;"/>
            <a href="{{ route('login') }}" class="font-weight-bold">Telkomsel Regional Jatimbalnus</a>
        </div>
        <div class="card">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
