@extends('admin.master')

@section('content')
    <div class="col-md-10 row justify-content-center mt-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="col-md-10 row justify-content-center">
            <h1>{{ __('slide.list') }}</h1>
        </div>
        {{ Form::open(['route' => 'create-slides', 'files' => true]) }}
            <div class="form-group">
                <div class="row">
                    {{ Form::file('name[]', $attributes = array('multiple' => true, 'class' => 'form-control', 'id' => 'images')) }}
                </div>
            </div>
            <div class="frame">
                <ul class="slidee">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="form-group">
                <div class="row">
                    {{ Form::submit(__('slide.create'), ['class' => 'btn btn-success mt-2']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/form_product.css') }}">
    <script type="text/javascript" src="{{ asset('js/admin/form_product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/sly/dist/sly.min.js') }}"></script>
@endsection
