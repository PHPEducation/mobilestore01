@extends('admin.master')

@section('content')
    <div class="mt-2">
        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div><h1>{{ __('product.add_title') }}</h1></div>
        <hr>
        {!! Form::open(['route' => 'store-products','method' => 'post', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
            <div class="col-md-9 float-left">
                <div class="form-group">
                    <div class="col-md-8">
                        <label for="name">{{ __('product.name') }}</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name product...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('home.catalog') }}</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control" id="catalog" name="catalog">
                                <option value="0">---</option>
                                @foreach($catalogs as $catalog)
                                    <option value="{{ $catalog->slug }}">{{ $catalog->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.category') }}</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control" id="category" name="category">
                               <option value="0" id="category01">--- {{ __('product.categories') }} --</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.price') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                     <div class="col-md-6 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.ram') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="ram" class="form-control" placeholder="Ram">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.hard_disk') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="hard_disk" class="form-control" placeholder="Hard Disk">
                        </div>
                    </div>
                     <div class="col-md-6 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.cpu') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="cpu" class="form-control" placeholder="CPU">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.operating_system') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="operating_system" class="form-control" placeholder="Operating System">
                        </div>
                    </div>
                     <div class="col-md-6 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.pin') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="pin" class="form-control" placeholder="Pin">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 form-group">
                        <div class="col-md-8">
                            <label for="catalog">{{ __('product.screen') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="screen" class="form-control" placeholder="Screen">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-8">
                            <label for="status">{{ __('product.status') }}</label>
                        </div>
                        <div class="col-md-10">
                            <div class="onoffswitch">
                                <input type="checkbox" name="status" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                <label class="onoffswitch-label" for="myonoffswitch">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-">
                    <label for="description">{{ __('product.description') }}</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                    <label for="specification_more">{{ __('product.specification_more') }}</label>
                    <textarea name="specification_more" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('product.add') }}" class="btn btn-success">
                </div>
            </div>
            <div class="col-md-3 float-left">
                <div class="upload-img">
                    <div class="form-group">
                        <label for="images">{{ __('product.images') }}</label>
                        <input type="file" name="images[]" class="form-control" multiple id="images">
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
                </div>
                <div class="warehouse mt-5">
                    <div class="card">
                        <div class="card-header">{{ __('product.warehouse') }}</div>
                        <div class="card-body">
                            <label for="qty">{{ __('product.qty') }}</label>
                            <input type="number" name="qty" class="form-control" id="qty">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="card">
                        <div class="card-header">{{ __('product.sale') }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('priceSale', __('product.price')) }}
                                    {{ Form::number('priceSale', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('contentSale', __('product.content')) }}
                                    <div class="col-md-12">
                                        {{ Form::textarea('contentSale', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/form_product.css') }}">
    <script type="text/javascript" src="{{ asset('js/admin/form_product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/sly/dist/sly.min.js') }}"></script>
@endsection
