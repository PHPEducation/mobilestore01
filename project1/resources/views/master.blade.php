<!DOCTYPE html>
<html>
<head>
    <title>@yield('title_page')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fontawesome/svg-with-js/css/fa-svg-with-js.css') }}">
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body>
    @include('navbar')
    @yield('content')
    @include('footer')

</body>
</html>
