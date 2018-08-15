$(document).ready(function() {
    $('#send').click(function() {
        if(rating = $('#rateYo').rateYo().rateYo('rating') < 1) {
            $('#errors_rating').css('display', 'block');

            return false;
        }
        if($('#comment-content').val().length < 3)
        {
            $('#errors').css('display', 'block');

            return false;
        }
        $('.errors').css('display', 'none');
        var rating = $('#rateYo').rateYo().rateYo('rating');
        $('#rating').val(rating);
        var content = $('#comment-content').val();
        var user_id = $('#user_id').val();
        var reviewable_id = $('#reviewable_id').val();
        var reviewable_type = $('#reviewable_type').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: window.location.origin + '/user-review',
            type: 'POST',
            data: {
                rating: rating,
                content: content,
                user_id: user_id,
                reviewable_id: reviewable_id,
                reviewable_type: reviewable_type
            },
            dataType: 'json'
        }).done(function(result) {
            $('#comment-content').val('');
            var text = '';
            for(var star = 0; star < result.rating; star++) {
                text += "<ion-icon name='star' class='star mt-1 mb-1'></ion-icon>";
            }
            $("#title-list-review").append(
            `<div>
                <hr id='hr'>
                ` + text + `
                <div id='comment_by'>By: <b>` + result.user + ` </b> at:` + result.created_at + `</div>
                <div class='mt-2'>` + result.content + `</div>
            </div>`);
            text = '';
        });
    });
});

function load_more(page) {
    $.ajax({
        url: '?page=' + page,
        type: 'get',
        datatype: 'html'
    }).done(function(result) {
        if(result.length == 0){
            $('.ajax-loading').html('No more records!');
            return;
        }
        var text = '';
        for(var i = 0; i < result.data.length; i++) {
            for(var star = 0; star < result.data[i].rating; star++) {
                text += "<ion-icon name='star' class='star mt-1 mb-1'></ion-icon>";
            }
            $("#reviews").append(
            `<div>
                <hr id='hr'>
                ` + text + `
                <div id='comment_by'>By: <b>` + result.data[i].user.name + ` </b> at:` + result.data[i].created_at + `</div>
                <div class='mt-2'>` + result.data[i].content + `</div>
            </div>`);
            text = '';
        }
    });
}

function showMore()
{
    var page = 1;
    $('#more').click(function(){
        page++;
        load_more(page);
    });
    load_more(page);
}
