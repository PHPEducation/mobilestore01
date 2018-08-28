@extends('admin.master')

@section('content')
    <div class="col-md-12 mt-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    </div>
    <h1 class="col-md-12"> {{ __('product.list') }} </h1>
    <table class="table table-striped table-hover table-bordered">
       <tr>
            <th scope="col">{{ __('product.image') }}</th>
            <th scope="col">{{ __('product.name') }}</th>
            <th scope="col">{{ __('product.price') }}</th>
            <th scope="col">{{ __('product.category') }}</th>
            <th scope="col">{{ __('product.status') }}</th>
            <th scope="col">{{ __('product.edit') }}</th>
            <th scope="col">{{ __('product.delete') }}</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{ asset('images/products/' . $product->images->first()->image) }}" width="100px" data-toggle="modal" data-target="#exampleModalLong{{ $product->id }}" id="show-img-product">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('product.all_image') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($product->images as $image)
                                        <img src="{{ asset('images/products/' . $image->image) }}" width="100%" class="mb-5" class="list-img">
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->categories->name }}</td>
                <td>
                    <div class="onoffswitch" id="onoffswitch{{$product->id}}">
                        <input type="checkbox" name="status" class="onoffswitch-checkbox" id="myonoffswitch{{$product->id }}" {{ $product->status == 1 ? 'checked' : '' }} onclick={{ $product->status == 1 ? 'unpublish(' . $product->id .',' .  $product->status . ')' : 'publish(' . $product->id .',' .  $product->status . ')'}}>
                        <label class="onoffswitch-label" for="myonoffswitch{{$product->id}}">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </td>
                <td>
                    <i class="far fa-edit mr-1"></i>
                    <a href="{{ route('edit-products', ['id' => $product->id]) }}">{{ __('product.edit') }}</a>
                </td>
                <td>
                    <i class="fas fa-trash-alt mr-1"></i>
                    <a href="{{ route('delete-products', ['id' => $product->id]) }}">{{ __('product.delete') }}</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('add-products') }}" class="btn btn-success">{{ __('product.add') }}</a>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/form_product.css') }}">
    <script type="text/javascript" src="{{ asset('js/admin/form_product.js') }}"></script>
@endsection
