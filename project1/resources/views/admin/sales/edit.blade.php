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
                <div class="card-header">{{ __('sales.edit') }}</div>
                <div class="card-body">
                    {!! Form::open([ 'route' => ['update-sales', $sale->id] ]) !!}
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('price', __('sales.price') ) !!}
                                {!! Form::number('price', $sale->price, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('content', __('sales.content') ) !!}
                                <textarea name="content" class='ckeditor' id="content">{{ $sale->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="row">
                                    <label for="category">{{ __('sales.category') }}</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="0">---</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->slug }}" {{ ($category_i == $category) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class=" form-group">
                            <div class="row">
                                <label for="product">{{ __('home.product') }}</label>
                                <select class="form-control" id="product" name="product_id">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ ($product_i->id == $product->id) ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::submit( __('sales.submit'), ['class' => 'btn btn-success'] ) !!}
                                <a href="{{ route('sales') }}" class="btn btn-info ml-2">{{ __('sales.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
