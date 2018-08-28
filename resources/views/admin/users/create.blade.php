@extends('admin.master')

@section('content')
    <h1 class="mt-5">{{ __('user.add_user') }}</h1>
    <hr>
    <div class="col-md-9 mt-5">
        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        {!! Form::open(['route' => 'admin-store-users']) !!}
            <div class="form-group">
                <div class="row">
                    <label for="name">{{ __('user.name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('user.name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="email">{{ __('user.email') }}</label>
                    <input type="text" name="email" class="form-control" placeholder="{{ __('user.email') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="password">{{ __('user.password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('user.password') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="password_confirm">{{ __('user.password_confirm') }}</label>
                    <input type="password" name="password_confirm" class="form-control" placeholder="{{ __('user.password_confirm') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="role">{{ __('user.role') }}</label>
                    <select class="form-control" id="role" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                    <label for="address">{{ __('user.address') }}</label>
                    <input type="text" name="address" class="form-control" placeholder="{{ __('user.address') }}">
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                    <label for="phone">{{ __('user.phone') }}</label>
                    <input type="text" name="phone" class="form-control" placeholder="{{ __('user.phone') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <input type="submit" value="{{ __('user.register') }}" class="btn btn-success">
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
