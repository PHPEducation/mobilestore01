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
                    {!! Form::open([ 'route' => [ 'update-abouts', $about->id ] ]) !!}
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('content', __('abouts.content') ) !!}
                                {!! Form::text('content', $about->content, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('key.submit'), ['class' => 'btn btn-success mr-2'] ) !!}
                                <a href="{{ route('abouts') }}" class="btn btn-info">{{ __('key.cancel') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
