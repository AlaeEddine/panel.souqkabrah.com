<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('layouts.headers.auth.head')
    </head>
    <body id="page-top">
        <div id="wrapper">
        <x-dashboard.sidebar />
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-dashboard.topbar />
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
        @yield('scripts')
        @yield('script')

        </div>
    </body>
</html>
