function seen (id)
{
    $(document).ready(function () {
        $.ajax({
            url: window.location.origin + '/admin/seen-notify/' + id,
            type: 'POST',
        });
    });
}
