<!doctype html>
<html lang="en">
    <head>
        @include('Components.head')
    </head>
    <body>
        <div id="wrapper">
            @include('Components.sidebar')
            @yield('container')
            @include('Components.footer')
    </body>
</html>