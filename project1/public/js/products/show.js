$('#img-product').elevateZoom();
function show(url){
    $(document).ready(function(){
        $('#img-product').attr('src', url);
        $('.zoomWindowContainer div').stop().css('background-image', 'url(' + url + ')');
    });
}
$(function () {
    $('#rateYo').rateYo({
        rating: 2,
        fullStar: true
    });
});
