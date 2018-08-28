@extends('admin.master')

@section('content')
	<div class="col-md-12 mt-5 mb-5">
        <div class="row justify-content-center"><h1>{{ __('list.orderDone') }}</h1></div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('order.id') }}</th>
                    <th>{{ __('order.total') }}</th>
                    <th>{{ __('order.name') }}</th>
                    <th>{{ __('order.address') }}</th>
                    <th>{{ __('order.phone') }}</th>
                    <th>{{ __('order.modeOfPayment') }}</th>
                    <th>{{ __('order.detail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr id="{{ $order->id }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->mode_of_payment->name }}</td>
                        <td>{{ link_to_route('detail.order', __('order.detail'), ['id' => $order->id]) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12 row justify-content-end">
            {{ $orders->links() }}
        </div>
        {{ link_to_route('home'), __('order.back'), [], ['class' => 'btn btn-info'] }}
    </div>
@endsection
