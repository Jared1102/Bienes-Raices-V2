<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienes Raices</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.header_index')
        @yield('container')
        @include('partials.chatbot')
        @include('partials.footer')      
        @yield('js')
    </body>
</html>
