@extends('master')

@section('content')
    <div class="col-md-12 mt-5 mb-5">
        <h1>{{ __('product.list_products') }}</h1>
        @if(isset($key))
            <div>{{ __('product.searchWithKey') }}&#58;&nbsp;&#34;{{ $key }}&#34;</div>
        @endif
        @foreach($products as $product)
            <div class="card ml-3 mt-4 card-product" >
                <img class="card-img-top" src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class="img-products-home">
                <div class="card-body">
                    <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h5>
                    <p class="card-text"></p>
                    <a href="{{ route('add-to-cart', ['id' => $product->id]) }}" class="btn btn-primary">{{ __('product.add_cart') }}</a>
                </div>
            </div>
        @endforeach
        {{ $products->links() }}
        <div class="clearfix"></div>
        <div class="col-md-12">
            <a href="{{ route('home-user') }}" class="btn btn-success mt-5">{{ __('product.back') }}</a>
        </div>
    </div>
@endsection
