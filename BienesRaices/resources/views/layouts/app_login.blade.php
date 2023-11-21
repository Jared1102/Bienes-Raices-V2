<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienes Raices</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/b4fe636f2d.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body style="background: url({{Vite::asset('resources/img/header.jpg')}})">
        @include('partials.header_login')
        @yield('container')
        {{-- @include('partials.footer')       --}}
        @yield('js') 
    </body>
</html>
