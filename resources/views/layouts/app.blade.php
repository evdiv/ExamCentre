<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @stack('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

</head>
<body>
    <div id="app">

        @include('layouts.navbar')

        <main>
            <nav class="navbar-stripe"></nav>

            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
