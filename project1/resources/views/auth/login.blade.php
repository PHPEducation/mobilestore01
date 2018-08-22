<!DOCTYPE html>
<html>
<head>
    <title>{{ __('key.login') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5" id="login-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        {!! Form::open(['url' => 'login']) !!}
                            <div class="form-group row">
                                {{ Form::label('email', __('user.email'), ['class' => 'col-sm-4 col-form-label text-md-right'] ) }}

                                <div class="col-md-6">
                                    {{ Form::email('email', $value = null, ['class' => 'form-control', 'required' => true]) }}

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('password', __('user.password'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}

                                <div class="col-md-6">
                                    {{ Form::password('password', ['class' => 'form-control', 'requied' => true]) }}
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{ Form::checkbox('remember', 'value', ['class' => 'form-check-input', old('remember') ? 'checked' : '']) }}
                                        {{ Form::label('remember', __('user.remember_me'), ['class' => 'form-check-label'] ) }}
                                        {{ link_to_route('password.request', __('Forgot Your Password?'), [], ['class' => 'btn btn-link']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    {{ Form::submit( __('user.login'), ['class' => 'btn btn-success']) }}
                                    {{ link_to_route('home-user', __('key.back'), [], ['class' => 'btn btn-info']) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
