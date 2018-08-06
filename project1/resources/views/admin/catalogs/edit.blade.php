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
                <div class="card-header">{{ __('catalog.edit') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => [ 'update-catalogs', $catalog->slug ] ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="name">{{ __('catalog.name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ $catalog->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('catalog.submit'), ['class' => 'btn btn-success mr-2'] ); !!}
                                <a href="{{ route('catalogs') }}" class="btn btn-info">{{ __('catalog.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
@endsection
