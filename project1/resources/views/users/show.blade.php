@extends('master')

@section('content')
    <div class="col-md-12 mb-3 mt-5 row justify-content-center">
        <div class="col-md-6">
            @if(count($errors->all()))
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            {!! Form::open(['route' => ['user-update-profile', 'id' => Auth::user()->id]]) !!}
                <div class="card">
                    <div class="card-header">
                        {{ __('user.profile') }}
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                {{ Form::label('name', __('user.name') ) }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{ Form::label('email', __('user.email') ) }}
                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'disabled' => true]) }}
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                {{ Form::label('password', __('user.password') ) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                {{ Form::label('password_confirm', __('user.password_confirm') ) }}
                                {{ Form::password('password_confirm', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{ Form::label('address', __('user.address') ) }}
                                {{ Form::text('address', $user->address, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{ Form::label('phone', __('user.phone') ) }}
                                {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{ Form::submit( __('user.edit'), ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
