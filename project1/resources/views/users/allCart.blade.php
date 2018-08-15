@extends('master')

@section('content')
    <div class="col-md-12 mt-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <h1 class="text-center">{{ __('cart.listproduct') }}</h1>
        <table class="table mb-5 table-hover table-bordered">
            <thead>
                <tr>
                    <th>{{ __('cart.id_product') }}</th>
                    <th>{{ __('cart.name_product') }}</th>
                    <th>{{ __('cart.price_product') }}</th>
                    <th>{{ __('cart.qty_product') }}</th>
                    <th>{{ __('cart.money') }}</th>
                    <th>{{ __('cart.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $row)               
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('user-show-product', ['slug'=> $row->options->slug]) }}">{{ $row->name }}</a></td>
                        <td>{{ $row->price }}</td>
                        <td id="qty-cart">
                            {{ Form::number('qty', $row->qty, ['class' => 'col-md-8', 'id' => "qty$row->rowId"]) }}
                            <i class="fas fa-sync" onclick="updateCart('{{ $row->rowId }}', '{{ __('cart.alert') }}')" id="update-cart-icon"></i>
                        </td>
                        <td id="money{{$row->rowId}}">{{ $row->price * $row->qty }}</td>
                        <td>
                            <i class="fa fa-trash"></i>
                            <a href="{{ route('delete-product-in-cart', ['id' => $row->rowId]) }}">{{ __('cart.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12 row justify-content-end">
            <div>
                <a href="{{ route('enter-info') }}" class="btn btn-success">{{ __('cart.goToOrder') }}</a>
                <a href="{{ route('home-user') }}" class="btn btn-secondary">{{ __('cart.back') }}</a>
            </div>
        </div>
        <div>
            <h3>{{ __('cart.count') }}<span id="count-products">&#58;&nbsp;{{ Cart::count() }}</span></h3>
            <h3>{{ __('cart.total') }}<span id="total">&#58;&nbsp;{{ Cart::subtotal() }}&nbsp;{{ __('cart.vnd') }}</span></h3>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/cart_update.js') }}"></script>
@endsection
