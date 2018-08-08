@extends('master')

@section('content')
    <div id="content" class="row ml-5 mr-2">
        <div class="col-md-8" id="slide">
            <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner" id="carousel-inner">
                    <div class="carousel-item active">
                        <img src="" alt="Los Angeles">
                    </div>
                    <div class="carousel-item">
                        <img src="" alt="Chicago">
                    </div>
                    <div class="carousel-item">
                        <img src="" alt="New York">
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        {{-- product --}}
        <div class="card mr-5 ml-3 card-hot card-product">
            <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary"></a>
                <a href="#" class="btn btn-primary"></a>
            </div>
        </div>
        <div class="left-menu col-md-3 mt-5 mb-5">
            <div class="card card-left">
                <div class="card-header">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9" id="main">
            <div style="" class="pl-5 mt-4 title-product"><a href=""></a> / <a href=""></a></div>
            <div id="phone">
                @if($products)
                    @foreach($products as $product)
                        <div class="card ml-3 mt-4 card-product" >
                            <img class="card-img-top" src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class="img-products-home">
                            <div class="card-body">
                                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-primary">{{ __('view') }}</a>
                                <a href="#" class="btn btn-primary">{{ __('add_cart') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="clearfix"></div>
                <nav aria-label="Page navigation example" class="mt-4 mr-5">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">{{ __('home.previous') }}</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">{{ __('home.next') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="pl-5 title-product"><a href=""></a> / <a href=""></a></div>
            <div id="laptop">
                <div class="card ml-3 mt-4 card-product" >
                    <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">{{ __('home.view') }}</a>
                        <a href="#" class="btn btn-primary">{{ __('home.add_cart') }}</a>
                    </div>
                </div>
                <div class="card ml-3 mt-4 card-product">
                    <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">{{ __('home.view') }}</a>
                        <a href="#" class="btn btn-primary">{{ __('home.add_cart') }}</a>
                    </div>
                </div>
                <div class="card ml-3 mt-4 card-product">
                    <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">{{ __('home.view') }}</a>
                        <a href="#" class="btn btn-primary">{{ __('home.add_cart') }}</a>
                    </div>
                </div>
                <div class="card ml-3 mt-4 card-product">
                    <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">{{ __('home.view') }}</a>
                        <a href="#" class="btn btn-primary">{{ __('home.add_cart') }}</a>
                    </div>
                </div>
                <div class="card ml-3 mt-4 card-product" >
                    <img class="card-img-top" src="" alt="Card image cap" class="img-products-home">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">{{ __('home.view') }}</a>
                        <a href="#" class="btn btn-primary">{{ __('home.add_cart') }}</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <nav aria-label="Page navigation example" class="mt-4 mr-5">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">{{ __('home.previous') }}</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#"></a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">{{ __('home.next') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
