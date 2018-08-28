<!DOCTYPE html>
<html>
<head>
    <title>@yield('title_page')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fontawesome/web-fonts-with-css/css/fontawesome.min.css') }}">
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/admin.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('admin.menu')
    <div class="container">
        @yield('content')
    </div>
    <div id="language">
        <div class="dropdown">
            <span class="text-danger"><small id="countNotify">{{ $countNotify }}</small></span>
            <i class="fas fa-bell dropbtn"></i>
            <div class="dropdown-content" id="notify-admin">
                @foreach($notifies as $notify)
                    {{ link_to($notify->link, $notify->content, ['id' => "notify$notify->id", 'onclick' => "seen($notify->id)", 'class' => $notify->status == 1 ? 'bg-white' : '']) }}
                @endforeach
                <div class="dropdown-divider"></div>
                {{ link_to_route('all.notify', __('order.all-notify')) }}
            </div>
        </div>
        <a href="{{ route('set_locale', ['locale' => 'vi']) }}"><img src="{{ asset('images/covietnam.jpg') }}"></a>
        <a href="{{ route('set_locale', ['locale' => 'en']) }}"><img src="{{ asset('images/coanh.png') }}"></a>
    </div>
    <script type="text/javascript" src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/realtime.js') }}"></script>

 </body>
</html>
