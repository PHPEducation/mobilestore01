@extends('admin.master')

@section('content')
    <div class="container-fuild">
        <div class="row ml-5 mr-5" >
            <div class="col-md-12" id="product_show">
                <!-- image product -->
                <div class="col-md-5 mb-2 float-left">
                    <div>
                        <img src="" data-toggle="modal" data-target="#exampleModalCenter" data-zoom-image="" id="img-product">
                    </div>
                    <!-- images product (4) -->
                    <div class="col-md-12 pb-5 pl-5 mt-3" id="images_4">
                        <div class="col-md-3 float-left">
                            <img src="" class="sub-img-product">
                        </div>
                        <div class="col-md-3 float-left">
                            <img src="" class="sub-img-product" >
                        </div>
                        <div class="col-md-3 float-left">
                            <img src="" class="sub-img-product">
                        </div>
                        <div class="col-md-3 float-left">
                            <img src="" class="sub-img-product" onclick="show('')">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- end images product -->
                </div>
                <!-- end image product -->
                <!-- detail -->
                <div class="col-md-4 float-left">
                    <div class="mt-4">
                        <div><h2></h2></div>
                        <div><h3></h3></div>
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
                                <li class="list-group-item"></li>
                                <li class="list-group-item"></li>
                                <li class="list-group-item"></li>
                                <li class="list-group-item"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end detail -->
                <div class="clearfix"></div>
            </div>
        </div>
            <!-- comment -->
            <div class="col-md-8 mt-4 mb-5 pt-5 pb-5 ml-5 float-left" id="comment">
                <div>
                    <div class="title"></div>
                    <hr>
                    <div id="rateYo"></div>
                    <div class="content mt-3">
                        <textarea class="form-control" placeholder="Comment..."></textarea>
                        <a href="#" class="btn btn-danger mt-2"></a>
                    </div>
                    <script type="text/javascript">
                        
                    </script>
                </div>
                <div class="comments mt-5">
                    <div></div>
                    <div>
                        <hr>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <div id="comment_by"> <b></b> </div>
                        <div class="mt-2"></div>
                    </div>
                    <div>
                        <hr>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <ion-icon name="star" class="star"></ion-icon>
                        <div id="comment_by"><b></b> </div>
                        <div class="mt-2"></div>
                    </div>
                </div>
            </div>
            <!-- end comment -->
            <!-- san pham tuong tu -->
            <div class="col-md-3 mt-4 float-left mb-5 pr-2">
                <div class="row  bg-white ml-3">
                        <div class="col-md-12 row justify-content-center mt-3"></div><br>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="product mb-3">
                            <div class="img float-left">    
                                <img src="" id="img-left">
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
                        <div class="product">
                            <div class="img float-left">    
                                <img src="" id="img-left">
                            </div>
                            <div class="col-md-7 float-left mb-3">
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
                        <div class="product">
                            <div class="img float-left">    
                                <img src="" id="img-left">
                            </div>
                            <div class="col-md-7 float-left mb-3">
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
            </div>
        <div class="clearfix"></div>
        <!-- end san pham tuog tu -->
    </div>
@endsection
