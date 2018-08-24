@extends('admin.master')

@section('content')
    <div class="col-md-10 row justify-content-center mt-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="col-md-10 row justify-content-center">
            <h1>{{ __('slide.list') }}</h1>
        </div>
        {{ Form::open(['route' => 'create-slides', 'files' => true]) }}
            <div class="form-group">
                <div class="row">
                    {{ Form::file('name', $attributes = ['class' => 'form-control', 'id' => 'images']) }}
                </div>
            </div>
            <div class="frame">
                <ul class="slidee">
                    <li></li>
                </ul>
            </div>
            <div class="form-group mt-3">
                <div class="row">
                    {{ Form::label('link', 'Link', ['class' => 'col-md-2 mt-2']) }} 
                    {{ Form::text('link', '', ['class' => 'form-control col-md-10']) }}
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    {{ Form::submit(__('slide.create'), ['class' => 'btn btn-success']) }}
                    <a href="{{ route('slides') }}" class="btn btn-info ml-2">{{ __('key.back') }}</a>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/form_product.css') }}">
    <script type="text/javascript" src="{{ asset('js/admin/form_product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/sly/dist/sly.min.js') }}"></script>
@endsection
