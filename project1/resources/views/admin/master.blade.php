<!DOCTYPE html>
<html>
<head>
    <title>@yield('title_page')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
    @include('admin.menu')
    <div class="container">
        @yield('content')
    </div>
    <div id="language">
        <a href="{{ route('set_locale', ['locale' => 'vi']) }}"><img src="{{ asset('images/covietnam.jpg') }}"></a>
        <a href="{{ route('set_locale', ['locale' => 'en']) }}"><img src="{{ asset('images/coanh.png') }}"></a>
    </div>

 </body>
</html>
