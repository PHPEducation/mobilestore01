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
                    <li data-target="#demo" data-slide-to="3"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner" id="carousel-inner">
                    @foreach($slides as $key => $slide)
                        <div class="carousel-item @if($key == 0) active @endif">
                            {{ Html::image(asset('images/slide/' . $slide->image), '', ['class' => 'images-slide', 'onclick' => "toLocation('$slide->link')"]) }}
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
                <div class="text-danger text-center"><small>{{ __('product.price') }}&#58;&nbsp;{{ $lastProduct->price }}</small></div>
                {{ link_to_route('add-to-cart', __('product.add_cart'), ['id' => $lastProduct->id], ['class' => 'btn btn-primary form-control']) }}
            </div>
        </div>
        <div class="left-menu col-md-3 mt-5 mb-5">
            <div class="card card-left">
                <div class="card-header">
                    {{ __('home.catalog') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($catalogs as $catalog)
                        <li class="list-group-item"><a href="">{{ $catalog->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('home.category') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            {{ link_to_route('search_with.category', $category->name, ['id' => $category->id]) }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('product.ram') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($rams as $ram)
                        <li class="list-group-item">{{ link_to_route('product.ram', $ram . __('product.gb'), ['ram' => $ram]) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('product.hardDisk') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($hardDisks as $hardDisk)
                        <li class="list-group-item">{{ link_to_route('product.hard_disk', $hardDisk , ['hardDisk' => $hardDisk]) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('product.pin') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($pins as $pin)
                        <li class="list-group-item">{{ link_to_route('product.pin', $pin , ['pin' => $pin]) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('product.screen') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($screens as $screen)
                        <li class="list-group-item">{{ link_to_route('product.screen', $screen , ['screen' => $screen]) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card mt-3 card-left">
                <div class="card-header">
                    {{ __('product.price') }}
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'search_with.price', 'class' => 'form-inline my-2 my-lg-0 mr-5']) }}
                        <div class="form-group">
                            <div class="row">
                                {{ Form::text('from', '', ['class' => 'form-control mr-sm-2', 'placeholder' => 'From']) }}
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <div class="row">
                                {{ Form::text('to', '', ['class' => 'form-control mr-sm-2', 'placeholder' => 'To']) }}
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <div class="row">
                                {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}       
                </div>
            </div>
        </div>
        <div class="col-md-9" id="main">
            <div style="" class="pl-5 mt-4 title-product"><a href=""></a>{{ __('product.allProductLastest') }}<a href=""></a></div>
            <div id="phone">
                @if($products)
                    @foreach($products as $product)
                        <div class="card ml-3 mr-1 mb-2 card-product row justify-content-center product-list" >
                            <div class="text-center"><img src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class=" img-products-home card-img-top"></div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->id]) }}">{{ $product->name }}</a></h5>
                                <div class="text-danger text-center"><small>{{ __('product.price') }}&#58;&nbsp;{{ $product->price }}</small></div>
                                <p class="card-text">{{ __('product.ram') }}&#58;&nbsp;{{ $product->ram }}</p>
                                <p class="card-text">{{ __('product.operating_system') }}&#58;&nbsp;{{ $product->operating_system }}</p>
                                @if($product->warehouse->quantity > 0)
                                    {{ link_to_route('add-to-cart', __('product.add_cart'), ['id' => $product->id], ['class' => 'btn btn-primary form-control']) }}
                                @else
                                    {{ Form::button(__('product.notProduct'), ['class' => 'btn disabled form-control']) }}
                                @endif
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
                        <div class="card ml-3 mr-1 mb-2 card-product row justify-content-center" >
                            <div class="text-center"><img src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class=" img-products-home card-img-top"></div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->id]) }}">{{ $product->name }}</a></h5>
                                <div class="text-danger text-center"><small>{{ __('product.price') }}&#58;&nbsp;{{ $product->price }}</small></div>
                                <p class="card-text">{{ __('product.ram') }}&#58;&nbsp;{{ $product->ram }}</p>
                                <p class="card-text">{{ __('product.operating_system') }}&#58;&nbsp;{{ $product->operating_system }}</p>
                                @if($product->warehouse->quantity > 0)
                                    {{ link_to_route('add-to-cart', __('product.add_cart'), ['id' => $product->id], ['class' => 'btn btn-primary form-control']) }}
                                @else
                                    {{ Form::button(__('product.notProduct'), ['class' => 'btn disabled form-control']) }}
                                @endif
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
    <script type="text/javascript" src="{{ asset('js/slide.js') }}"></script>
@endsection
