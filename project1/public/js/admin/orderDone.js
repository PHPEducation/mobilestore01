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
