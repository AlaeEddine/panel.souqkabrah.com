<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.headers.guest.head')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="rtl">
        @yield('content')
        @include('layouts.footers.guest.footer')
    </body>
</html>
