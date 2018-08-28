var slyelement = {
    obj: {},
    el: '.frame',
    options: {
        horizontal: 1,
        itemNav: 'forceCentered',
        smart: 1,
        activateMiddle: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 0,
        scrollBy: 1,
        speed: 300,
        elasticBounds: 1,
        easing: 'swing', // easeInOutElastic, easeOutBounce
        scrollBar: $('.scrollbar')
    }
};

$(function () {
    slyelement.obj = new Sly($(slyelement.el), slyelement.options);
    slyelement.obj.init();
});

$(window).resize(function(e) {
    slyelement.obj.reload();
});

$(document).ready(function () {
    $('#images').on('change', function() {
        $('.slidee').html('');
        var total = document.getElementById('images').files.length;
        for(i = 0; i < total; i++) {
            $('.slidee').append("<li><img src='" + URL.createObjectURL(event.target.files[i]) + "' width='171px' height='240px'></li>");
        }
    });
});

 $(document).ready(function () {
    var rs = Array();
    $('#catalog').change(function () {
        $('#category').html('');
        var base_url = window.location.origin
        var url = base_url + '/admin/' + $(this).val() + '/categories';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
        }).done(function (result) {
            for (var i = 0; i < result.length; i++) {
               $('#category').append('<option value=' + result[i].id + '>' + result[i].name + '</option>');
            }
        });
    });
});

function publish(id, status)
{
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = 'publish/product';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                status: status
            }
        }).done(function(result) {
            $('#onoffswitch' + result.id).html(` 
                <input type='checkbox' name='status' checked class='onoffswitch-checkbox' id='myonoffswitch`  + result.id + `' onclick='unpublish(` + result.id + `, ` + result.status + `)'>
                <label class='onoffswitch-label' for='myonoffswitch` + result.id + `'>
                <span class='onoffswitch-inner'></span>
                <span class='onoffswitch-switch'></span>
            </label>`
            );
        });
    });
}

function unpublish(id, status)
{
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = 'publish/product';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                status: status
            }
        }).done(function(result) {
            $('#onoffswitch' + result.id).html(` 
                <input type='checkbox' name='status' class='onoffswitch-checkbox' id='myonoffswitch`  + result.id + `' onclick='publish(` + result.id + `, ` + result.status + `)'>
                <label class='onoffswitch-label' for='myonoffswitch` + result.id + `'>
                <span class='onoffswitch-inner'></span>
                <span class='onoffswitch-switch'></span>
            </label>`
            );
        });
    });
}

CKEDITOR.replace('description');
CKEDITOR.replace('specification_more');
CKEDITOR.replace('contentSale');
