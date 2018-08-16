@extends('admin.master')

@section('content')
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('payment.create') }}</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'create-mode-of-payment']) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="name">{{ __('payment.name') }}</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <input type="submit" value="{{ __('payment.submit') }}" class="btn btn-success">
                                 <a href="{{ route('mode-of-payments') }}" class="btn btn-info ml-2">{{ __('category.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
            </div>
        </div>
@endsection
