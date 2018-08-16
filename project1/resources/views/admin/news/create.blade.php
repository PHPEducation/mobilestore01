@extends('admin.master')

@section('content')
    <script type="text/javascript" src="{{ asset('js/admin/form_product.js') }}"></script>
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
                <div class="card-header">{{ __('news.created') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => 'store-news' ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="title">{{ __('news.title') }}</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="content">{{ __('news.content') }}</label>
                                <textarea name="content" class="ckeditor"></textarea>   
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="catalog">{{ __('home.catalog') }}</label>
                                <select class="form-control" id="catalog" name="catalog">
                                    <option value="0">---</option>
                                    @foreach($catalogs as $catalog)
                                        <option value="{{ $catalog->slug }}">{{ $catalog->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="catalog">{{ __('home.category') }}</label>
                                <select class="form-control" id="category" name="category">
                                   <option value="0" id="category01">--- {{ __('product.categories') }} --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('news.submit'), ['class' => 'btn btn-success'] ) !!}
                                <a href="{{ route('news') }}" class="btn btn-info ml-2">{{ __('news.cancel') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
