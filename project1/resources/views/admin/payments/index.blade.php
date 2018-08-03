@extends('admin.master')

@section('content')
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <table class="table">
           <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach($mode_of_payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->name }}</td>
                    <td><a href="{{ url('admin/edit-mode-of-payments/' . $payment->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ url('admin/delete-mode-of-payments/' . $payment->id) }}">{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
@endsection
