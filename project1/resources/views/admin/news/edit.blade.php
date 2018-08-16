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
                <div class="card-header">{{ __('news.edit') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => ['update-news', $news->id] ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="title">{{ __('news.title') }}</label>
                                <input type="text" name="title" value="{{ $news->title }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="content">{{ __('news.content') }}</label>
                                <textarea name="content" class="ckeditor">{{ $news->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="catalog">{{ __('home.catalog') }}</label>
                                <select class="form-control" id="catalog" name="catalog">
                                    <option value="0">---</option>
                                    @foreach($catalogs as $catalog)
                                        <option value="{{ $catalog->slug }}" {{ ($catalog_i == $catalog) ? 'selected' : '' }}>{{ $catalog->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" form-group">
                            <div class="row">
                                <label for="catalog">{{ __('home.category') }}</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ ($category_i->id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('news.submit'), ['class' => 'btn btn-success'] ) !!}
                                <a href="{{ route('news') }}" class="btn btn-info ml-2">{{ __('news.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
