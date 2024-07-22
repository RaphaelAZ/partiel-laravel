<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Partiel Books') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav>
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Accueil
                </a>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
