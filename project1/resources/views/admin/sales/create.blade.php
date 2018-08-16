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
                <div class="card-header">{{ __('sales.create') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => 'store-sales' ]) !!}
                        <div class="form-group">
                            <div class="row">
                                <label for="price">{{ __('sales.price') }}</label>
                                <input type="number" name="price" class="form-control" id="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="content">{{ __('sales.content') }}</label>
                                <textarea name="content" class="ckeditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="category">{{ __('sales.category') }}</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="0">---</option> 
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="product">{{ __('home.product') }}</label>
                                <select class="form-control" id="product" name="product_id">
                                   <option value="0" id="product01" >--- {{ __('sales.products') }} --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('key.submit'), ['class' => 'btn btn-success mr-2' ]) !!}
                                <a href="{{ route('sales') }}" class="btn btn-info">{{ __('sales.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection()
