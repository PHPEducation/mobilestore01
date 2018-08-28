<!DOCTYPE html>
<html>
<head>
    <title>{{ __('user.register') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($errors->all()) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => "user-register"]) !!}
                            <div class="form-group row">
                                {{ Form::label('name', __('user.name'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}

                                <div class="col-md-6">
                                    {{ Form::text('name', $value = null, ['class' => 'form-control', 'requied' => true, 'autofocus' => true]) }}
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('email', __('user.email'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}

                                <div class="col-md-6">
                                    {{ Form::email('email', $value = null, ['class' => 'form-control']) }}

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
                                {{ Form::label('password_confirm', __('user.password_confirm'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}
                                <div class="col-md-6">
                                    {{ Form::password('password_confirm', ['class' => 'form-control', 'requied' => true]) }}
                                </div>
                            </div>

                             <div class="form-group row">
                                {{ Form::label('address', __('user.address'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}
                                <div class="col-md-6">
                                    {{ Form::text('address', $value = null, ['class' => 'form-control', 'requied' => true, 'autofocus' => true]) }}

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group row">
                               {{ Form::label('phone', __('user.phone'), ['class' => 'col-md-4 col-form-label text-md-right'] ) }}
                                <div class="col-md-6">
                                    {{ Form::text('phone', $value = null, ['class' => 'form-control', 'requied' => true, 'autofocus' => true]) }}

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="role" value="{{ $roleUser->id }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ Form::submit( __('user.register'), ['class' => 'btn btn-success']) }}
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
