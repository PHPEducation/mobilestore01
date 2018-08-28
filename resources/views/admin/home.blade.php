@extends('admin.master')

@section('content')
    <script type="text/javascript" src="{{ asset('bower_components/chart.js/dist/Chart.js') }}"></script>
    <div class="row mt-5 col-md-12">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="col-md-12">
                    {{ Form::label('Year', __('home.year'), ['class' => 'col-md-1 float-left mt-2']) }}
                    {{ Form::select('year', [], [], ['class' => 'form-control col-md-10 float-left mb-3', 'id' => 'year']) }}
                    <div class="clearfix"></div>
                </div>
                <div class="panel-heading"><b>{{ __('order.statistical') }}</b></div>
                <div class="panel-body" id="panel-body">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5 mb-5">
        <div class="row justify-content-center"><h1>{{ __('list.orderWaiting') }}</h1></div>
        <div class="row justify-content-end">
            <div>{{ link_to_route('product.order_success', __('order.doing'), [], ['class' => 'btn btn-info mb-3']) }}</div>
            <div>{{ link_to_route('order.processed', __('order.done'), [], ['class' => 'btn btn-success ml-2 mb-3']) }}</div>
        </div>
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
                    <th>{{ __('order.done') }}</th>
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
                        <td>{{ Form::button(__('order.doing'), ['id' => 'done', 'class' => 'btn btn-info', 'onclick' => "orderDone($order->id)"]) }}</td>
                        <td>{{ Form::button(__('order.done'), ['id' => 'done2', 'class' => 'btn btn-success', 'onclick' => "processedOrder($order->id)"]) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="{{ asset('js/admin/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/orderDone.js') }}"></script>
@endsection
