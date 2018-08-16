@extends('master')

@section('content')
    <div class="col-md-12 mt-5 mb-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <h1 class="text-center">{{ __('cart.listproduct') }}</h1>
        <table class="table mb-5 table-hover table-bordered">
            <thead>
                <tr>
                    <th>{{ __('cart.name_product') }}</th>
                    <th>{{ __('cart.price_product') }}</th>
                    <th>{{ __('cart.qty_product') }}</th>
                    <th>{{ __('cart.order_detail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordered as $row)
                    @foreach($row->detail_orders as $detailOrder)
                        <tr>
                            <td><a href="{{ route('user-show-product', ['slug'=> $detailOrder->detail_orderable->slug]) }}">{{ $detailOrder->detail_orderable->slug }}</a></td>
                            <td>{{ $detailOrder->price }}</td>
                            <td id="qty-cart">
                                <div>{{ $detailOrder->quantity }}</div>
                            </td>
                            <td>{{ $row->id }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12 row justify-content-end">
            <div>
                <a href="{{ route('home-user') }}" class="btn btn-secondary">{{ __('cart.back') }}</a>
            </div>
        </div>
        <div>
        </div>
    </div>
@endsection
