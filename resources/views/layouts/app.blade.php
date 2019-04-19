<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'Prepare for the IELTS speaking exam in the most effective way. All virtual exams are created by real IELTS examiners.')">
    <meta name="keywords" content="@yield('keywords', 'IELTS Speaking test preparation, real IELTS speaking exams, IELTS speaking topics')">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon_io//favicon-16x16.png">
    <link rel="manifest" href="/images/favicon_io/site.webmanifest">

    <!-- Scripts -->
    @stack('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

</head>
<body>
    @include('layouts.ga')
    <div id="app" class="wrapper">

        @include('layouts.navbar')

        <main>
            <nav class="navbar-stripe"></nav>

            @yield('content')

        </main>

        <div class="push"></div>
    </div>

    @include('layouts.footer')
</body>
</html>
