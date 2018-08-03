<div id="header" class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mr-5" href="#"></a>
        {!! Form::open(['url' => '', 'class' => 'form-inline my-2 my-lg-0 mr-5']) !!}
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">{{ __('navbar.search') }}</button>
        {!! Form::close() !!}
        <div class="collapse navbar-collapse row ml-5 justify-content-end" id="navbarTogglerDemo03">
            <ul class="navbar-nav my-2 my-lg-0 ">
                <li>
                    <div class="mt-1 mr-4">
                        <a href=""><img src="" width="30px"></a>
                        <a href=""><img src="" width="30px"></a>
                    </div>
                </li>
                <ion-icon name="logo-android"></ion-icon>
                <li class="mr-2 mt-1">
                    <div class="dropdown" id="android">
                        <span class="dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="item-android">
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                        </div>
                    </div>
                </li>
                <ion-icon name="logo-apple"></ion-icon><li class="mt-1 mr-2 menu-item"><a href=""></a></li>
                <ion-icon name="magnet"></ion-icon><li class="mr-2 mt-1 menu-item"><a href="#"></a></li>
            </ul>
            <div class="nav-item dropdown" id="member">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class=" dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" >
                    <a class="dropdown-item" href=""></a>
                    <a class="dropdown-item" href="">{{ __('navbar.login') }}</a>
                </div>
            </div>
        </div>
    </nav>
</div>
