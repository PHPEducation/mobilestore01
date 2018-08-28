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
                <div class="card-header">{{ __('category.add') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => 'create-categories' ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="name">{{ __('category.name') }}</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="name">{{ __('category.name_parent') }}</label>
                                <select name="catalog" class="form-control">

                                    @if(isset($categories_parent) > 0)
                                        @foreach($categories_parent as $category_parent)
                                            <option value="{{ $category_parent['id'] }}">{{ $category_parent['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <input type="submit" value="{{ __('category.submit') }}" class="btn btn-success mr-2">
                                <a href="{{ route('categories') }}" class="btn btn-info">{{ __('category.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
@endsection
