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
                    <th>{{ __('order.id') }}</th>
                    <th>{{ __('order.total') }}</th>
                    <th>{{ __('order.name') }}</th>
                    <th>{{ __('order.address') }}</th>
                    <th>{{ __('order.phone') }}</th>
                    <th>{{ __('order.modeOfPayment') }}</th>
                    <th>{{ __('order.detail') }}</th>
                    <th>{{ __('order.status') }}</th>
                    <th>{{ __('order.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordered as $order)
                  <tr id="{{ $order->id }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->mode_of_payment->name }}</td>
                        <td><a href="{{ route('user_detail.order', ['id' => $order->id]) }}">{{ __('order.detail') }}</a></td>
                        <td>@if($order->status == 0) {{ __('order.waiting
') }} @elseif($order->status == 1) {{ __('order.doing') }} @else {{ __('order.done') }} @endif</td>
                        <td><a href="{{ route('delete.order', ['id' => $order]) }}">{{ __('key.delete') }}</a></td>
                    </tr>
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
