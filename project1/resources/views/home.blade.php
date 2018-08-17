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
                    @foreach($slides as $key => $slide)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <img src="{{ asset('images/slide/' . $slide->image) }}" alt="Los Angeles" class="images-slide">
                        </div>
                    @endforeach
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
            <div class="text-center mt-2">
                <h4 class="text-danger">{{ __('product.lastest') }}</h4>
            </div>
            <img class="card-img-top" src="{{ asset('images/products/' . $lastProduct->images->first()->image) }}" alt="Card image cap" class="img-products-home">
            <div class="card-body">
                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $lastProduct->id]) }}">{{ $lastProduct->name }}</a></h5>
                <a href="#" class="btn btn-primary">{{ __('product.add_cart') }}</a>
            </div>
        </div>
        <div class="left-menu col-md-3 mt-5 mb-5">
            <div class="card card-left">
                <div class="card-header">
                    {{ __('home.catalogs') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($catalogs as $catalog)
                        <li class="list-group-item"><a href="">{{ $catalog->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('home.categories') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item"><a href="">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9" id="main">
            <div style="" class="pl-5 mt-4 title-product"><a href=""></a>{{ __('product.allProductLastest') }}<a href=""></a></div>
            <div id="phone">
                @if($products)
                    @foreach($products as $product)
                        <div class="card ml-3 card-product row justify-content-center product-list" >
                            <div class="text-center"><img src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class=" img-products-home card-img-top"></div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->id]) }}">{{ $product->name }}</a></h5>
                                <p class="card-text">{{ __('product.ram') }}&#58;&nbsp;{{ $product->ram }}</p>
                                <p class="card-text">{{ __('product.operating_system') }}&#58;&nbsp;{{ $product->operating_system }}</p>
                                <a href="{{ route('add-to-cart', ['id' => $product->id]) }}" class="btn btn-primary" class="btn-add-cart">{{ __('product.add_cart') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="clearfix"></div>
                <nav aria-label="Page navigation example" class="mt-4 mr-5">
                    <div class="row justify-content-end">
                        {{ $products->links() }}
                    </div>
                </nav>
            </div>
            <div class="pl-5 title-product"><a href=""></a>{{ __('product.topview') }}<a href=""></a></div>
            <div id="laptop">
                @if($products_topview)
                    @foreach($products_topview as $product)
                        <div class="card ml-3 card-product row justify-content-center" >
                            <div class="text-center"><img src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class=" img-products-home card-img-top"></div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->id]) }}">{{ $product->name }}</a></h5>
                                <p class="card-text">{{ __('product.ram') }}&#58;&nbsp;{{ $product->ram }}</p>
                                <p class="card-text">{{ __('product.operating_system') }}&#58;&nbsp;{{ $product->operating_system }}</p>
                                <a href="{{ route('add-to-cart', ['id' => $product->id]) }}" class="btn btn-primary">{{ __('product.add_cart') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                
                <div class="clearfix"></div>
                <nav aria-label="Page navigation example" class="mt-4 mr-5">
                    <div class="row justify-content-end">
                        {{ $products_topview->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
