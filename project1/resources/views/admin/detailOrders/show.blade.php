@extends('admin.master')

@section('content')
    <div class="col-md-12 mt-5">
        <div class="row justify-content-center"><h1>{{ __('detailOrder.list') }}&nbsp;<small>({{ __('detailOrder.order') }}&#58;&nbsp;{{ $order->id }})</small></h1></div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('detailOrder.id') }}</th>
                    <th>{{ __('detailOrder.nameProduct') }}</th>
                    <th>{{ __('detailOrder.price') }}</th>
                    <th>{{ __('detailOrder.quantity') }}</th>
                    <th>{{ __('detailOrder.order') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailOrders as $detailOrder)
                    <tr>
                        <td>{{ $detailOrder->id }}</td>
                        <td>{{ $detailOrder->detail_orderable->name }}</td>
                        <td>{{ $detailOrder->price }}</td>
                        <td>{{ $detailOrder->quantity }}</td>
                        <td>{{ $detailOrder->order->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ link_to_route('home', __('key.back'), [], ['class' => 'btn btn-success']) }}
    </div>
@endsection
