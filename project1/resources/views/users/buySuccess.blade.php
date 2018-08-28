@extends('master')

@section('content')
    <div class="col-md-12 row justify-content-center mt-5 mb-5">
        <div class="card">
            <div class="card-header">{{ __('order.success') }}</div>
            <div class="card-body">
                <div class="alert alert-success mt-5">{{ __('order.order_success') }}</div>
                <a href="{{ route('home-user') }}" class="btn btn-success">{{ __('home.home') }}</a>
            </div>
        </div>
    </div>
@endsection
