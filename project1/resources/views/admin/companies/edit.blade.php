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
                <div class="card-header">{{ __('key.edit') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => [ 'update-companies', $company->id ] ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="name">{{ __('companies.name') }}</label>
                                {!! Form::text('name', $company->name, ['class' => 'form-control'] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="phone">{{ __('companies.phone') }}</label>
                                {!! Form::text('phone', $company->phone, ['class' => 'form-control'] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="email">{{ __('companies.email') }}</label>
                                {!! Form::email('email', $company->email, ['class' => 'form-control'] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="address">{{ __('companies.address') }}</label>
                                {!! Form::text('address', $company->address, ['class' => 'form-control'] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('key.submit'), ['class' => 'btn btn-success mr-2'] ) !!}
                                <a href="{{ route('companies') }}" class="btn btn-info">{{ __('key.cancel') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
