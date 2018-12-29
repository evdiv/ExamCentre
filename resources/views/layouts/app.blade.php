<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">


</head>
<body>
    <div id="app">

        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
