@extends('admin.master')

@section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('category.payment') }} </h1>
        <table class="table table-striped table-hover table-bordered">
           <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach($modeOfPayments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->name }}</td>
                    <td><a href="{{ url('admin/edit-mode-of-payments/' . $payment->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ url('admin/delete-mode-of-payments/' . $payment->id) }}">{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('add-mode-of-payment') }}" class="btn btn-success">{{ __('key.add') }}</a>
@endsection
