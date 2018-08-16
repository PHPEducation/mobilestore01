@extends('admin.master')

@section('content')
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('sales.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="col">{{ __('id') }}</th>
                <th scope="col">{{ __('sales.price') }}</th>
                <th scope="col">{{ __('sales.content') }}</th>
                <th scope="col">{{ __('sales.product_id') }}</th>
                <th scope="col">{{ __('key.edit') }}</th>
                <th scope="col">{{ __('key.delete') }}</th>
            </tr>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{!! $sale->content !!}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td><a href="{{ url('admin/edit-sales/' . $sale->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ route('delete-sales', $sale->id) }}" >{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <div class="row">
            <a href="{{ route('add-sales') }}" class="btn btn-success">{{ __('new.add') }}</a>
        </div>
    </div>
@endsection
