@extends('admin.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css_product.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/rateYo/src/jquery.rateyo.css') }}">
<script type="text/javascript" src="{{ asset('bower_components/rateYo/src/jquery.rateyo.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/elevatezoom/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <div class="row ml-2">
        <div class="col-md-12" id="product_show">
            <!-- image product -->
            <div class="col-md-5 mb-2 float-left">
                <div>
                    <img src="{{ asset('images/products/' . $product->images->first()->image) }}" data-toggle="modal"  data-zoom-image="{{ asset('images/products/' . $product->images->first()->image) }}" id="img-product">
                </div>
                <!-- images product (4) -->
                <div class="col-md-12 pb-5 pl-5 mt-3" id="images_4">
                    @foreach($product->images->take(4) as $image)
                    <div class="col-md-3 float-left">
                        <img src="{{ asset('images/products/' . $image->image) }}" width="70px" height="50px" id="sub-img-product" onclick="show('{{ asset('images/products/' . $image->image ) }}')" data-zoom-image="{{ asset('images/products/' . $product->images->first()->image) }}" >
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <!-- end images product -->
            </div>
            <!-- end image product -->
            <!-- detail -->
            <div class="col-md-4 float-left">
                <div class="mt-4">
                    <div><h2>{{ $product->name }}</h2></div>
                    <div><h3>{{ number_format($product->price) . ' đ' }}</h3></div>
                </div>
                <div class="card mt-3">
                    <div class="card-header"></div>
                        <div class="card-body">
                            <ul id="list-sales">
                                <li><ion-icon name="gift" class="icon-ul mr-2"></ion-icon></li>
                                <li><ion-icon name="gift" class="icon-ul mr-2"></ion-icon></li>
                                <li><ion-icon name="gift" class="icon-ul mr-2"></ion-icon></li>
                                <li><ion-icon name="gift" class="icon-ul mr-2"></ion-icon></li>
                            </ul>
                        </div>
                    </div>
                <div class="mt-4">
                    <a href="#" class="btn btn-success col-md-6 float-left mr-2"></a>
                    <a href="#" class="btn btn-info col-md-5 float-left"></a>
                </div>
            </div>
            <div class="col-md-3 mt-4 float-right">
                <div class="card" id="configuration">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $product->ram }}</li>
                            <li class="list-group-item">{{ $product->hard_disk }}</li>
                            <li class="list-group-item">{{ $product->cpu }}</li>
                            <li class="list-group-item">{{ $product->pin}}</li>
                            <li class="list-group-item">{{ $product->screen}}</li>
                            <li class="list-group-item">{{ $product->operating_system }}</li>
                            <li class="list-inline-item mt-5">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                {{ __('product.show_more') }}
                                </button>
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('product.configuration') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">{{ $product->ram }}</li>
                                                    <li class="list-group-item">{{ $product->hard_disk }}</li>
                                                    <li class="list-group-item">{{ $product->cpu }}</li>
                                                    <li class="list-group-item">{{ $product->pin}}</li>
                                                    <li class="list-group-item">{{ $product->screen}}</li>
                                                    <li class="list-group-item">{{ $product->operating_system }}</li>
                                                    <li class="list-group-item">{{ $product->description }}</li>
                                                    <li class="list-group-item">{{ $product->specification_more }}</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ _('product.close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end detail -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- comment -->
    <div class="col-md-8 mt-4 mb-5 pt-5 pb-5 float-left" id="comment">
        <div>
            <div class="title"></div>
            <hr>
        </div>
        <div class="comments mt-5">
            <div></div>
            <div>
                <hr>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <div id="comment_by"> <b></b></div>
            </div>
            <div>
                <hr>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <ion-icon name="star" class="star"></ion-icon>
                <div id="comment_by"> <b></b> </div>
            </div>
        </div>
    </div>
    <!-- end comment -->
    <!-- san pham tuong tu -->
    <div class="col-md-4 mt-4 float-left mb-5 pr-2">
        <div class="row bg-white ml-3">
                <div class="col-md-12 row justify-content-center mt-3"></div><br>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="product mb-3">
                    <div class="img float-left">    
                        <img src="" width="100px">
                    </div>
                    <div class="col-md-7 float-left">
                        <b></b>
                        <div class="mt-2 text-danger"><small><b></b></small></div>
                        <div class="mt-2">
                            <small><ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul></small>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <div class="clearfix"></div>
    <script type="text/javascript" src="{{ asset('js/products/show.js') }}"></script>
@endsection
