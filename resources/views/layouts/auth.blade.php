<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500;700&display=swap" rel="stylesheet">
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inconsolata', monospace !important;
            font-weight: 700;
        }
    </style>
</head>
<body  class=" border-top-wide border-primary d-flex flex-column">
<script src="{{ asset('js/demo-theme.min.js') }}"></script>
<div class="page page-center">

    <div class="container container-tight py-4">
        @yield('content')

    </div>
</div>

<script src="{{ asset('js/tabler.min.js') }}" defer></script>
<script src="{{ asset('js/demo.min.js') }}" defer></script>
@yield('scripts')
</body>
</html>
