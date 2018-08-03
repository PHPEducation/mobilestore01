<div class="noty text-center">
    <div id="count-cart">1</div>
    <ion-icon name="basket" id="icon-cart">
</div>
    <div id="avg" class="text-center">
        {{ __('footer.avg') }}
    </div>
    <div id="about" class="mt-5 ml-5 mr-5 mb-5">
        <div class="col-md-5 float-left">
            <div class="text-center">{{ __('footer.send_message') }}</div>
            <hr>
            {!! Form::open(['url' => 'foo/bar']) !!}
                <div class="col-md-6 float-left">
                    <input type="text" name="" class="form-control" placeholder="Name...">
                </div>
                <div class="col-md-6 float-left">
                    <input type="text" name="" class="form-control" placeholder="Email...">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mt-2">
                    <textarea rows="4" placeholder="Message..." class="form-control"></textarea>
                </div>
                <div class="mt-2">
                    <input type="submit" value="{{ __('footer.send_message') }}" class="btn btn-primary justify-content-end">
                </div>
            {!! Form::close() !!}
        </div>
        {{-- contact --}}
        <div class="col-md-4 float-left">
            <div>{{ __('footer.our_location') }}</div>
            <hr>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
        {{-- end contact --}}
        <div class="col-md-3 float-left">
            <div>{{ __('footer.social_tile') }}</div>
            <hr>
            <div>
                <img src="" class="mr-1">
                <img src="" class="mr-1">
                <img src="" class="mr-1">
                <img src="" class="mr-1"></div>
            <div>{{ __('footer.social') }}</div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="footer" class="pl-5">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
