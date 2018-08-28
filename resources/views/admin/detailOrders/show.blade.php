@extends('admin.master')

@section('content')
    <div class="col-md-12 mt-5">
        <div class="row justify-content-center"><h1>{{ __('detailOrder.list') }}&nbsp;<small>({{ __('detailOrder.order') }}&#58;&nbsp;{{ $order->id }})</small></h1></div>
        <div><b>{{ __('order.name') }}</b>&#58;&nbsp;{{ $order->name }}</div>
        <div><b>{{ __('order.address') }}</b>&#58;&nbsp;{{ $order->address }}</div>
        <div><b>{{ __('order.phone') }}</b>&#58;&nbsp;{{ $order->phone }}</div>
        <div><b>{{ __('order.email') }}</b>&#58;&nbsp;{{ $order->email }}</div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('detailOrder.id') }}</th>
                    <th>{{ __('detailOrder.nameProduct') }}</th>
                    <th>{{ __('detailOrder.price') }}</th>
                    <th>{{ __('detailOrder.quantity') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailOrders as $detailOrder)
                    <tr>
                        <td>{{ $detailOrder->id }}</td>
                        <td>{{ $detailOrder->detail_orderable->name }}</td>
                        <td>{{ $detailOrder->price }}</td>
                        <td>{{ $detailOrder->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ link_to_route('home', __('key.back'), [], ['class' => 'btn btn-success']) }}
    </div>
@endsection
