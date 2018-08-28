@extends('master')

@section('content')
    <div class="col-md-12 mt-5 mb-5">
        <h1>{{ __('product.list_products') }}</h1>
        @foreach($products as $product)
            <div class="card ml-3 mt-4 card-product" >
                <img class="card-img-top" src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="Card image cap" class="img-products-home">
                <div class="card-body">
                    <h5 class="card-title text-center"><a href="{{ route('user-show-product', ['slug' => $product->id]) }}">{{ $product->name }}</a></h5>
                    <div class="text-danger text-center"><small>{{ __('product.price') }}&#58;&nbsp;{{ $product->price }}</small></div>
                    <p class="card-text"></p>
                    {{ link_to_route('add-to-cart', $title = __('add_cart'), $parameters = ['id' => $product->id], $attributes = ['class' => 'btn btn-primary form-control']) }}
                </div>
            </div>
        @endforeach
        {{ $products->links() }}
        <div class="clearfix"></div>
        <div class="col-md-12">
            <a href="{{ route('home-user') }}" class="btn btn-success mt-5">{{ __('product.back') }}></a>
        </div>
    </div>
@endsection
