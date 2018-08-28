$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function orderDone(id)
{
    $(document).ready(function () {
        $.ajax({
            url: window.location.origin + '/unpublish-order',
            type: 'POST',
            data: {
                id: id
            }
        }).done(function(result) {
            $('#' + result.id).remove();
        });
    });
}

function processedOrder(id)
{
    $(document).ready(function () {
        $.ajax({
            url: window.location.origin + '/processed',
            type: 'POST',
            data: {
                id: id
            }
        }).done(function(result) {
            $('#' + result.id).remove();
        });
    });
}

