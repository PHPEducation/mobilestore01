function publishUser(id, status)
{
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin + '/admin/publish/user';
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
                <input type='checkbox' name='status' checked class='onoffswitch-checkbox' id='myonoffswitch`  + result.id + `' onclick='unpublishUser(` + result.id + `, ` + result.status + `)'>
                <label class='onoffswitch-label' for='myonoffswitch` + result.id + `'>
                <span class='onoffswitch-inner'></span>
                <span class='onoffswitch-switch'></span>
            </label>`
            );
        });
    });
}

function unpublishUser(id, status)
{
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin + '/admin/publish/user';
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
                <input type='checkbox' name='status' class='onoffswitch-checkbox' id='myonoffswitch`  + result.id + `' onclick='publishUser(` + result.id + `, ` + result.status + `)'>
                <label class='onoffswitch-label' for='myonoffswitch` + result.id + `'>
                <span class='onoffswitch-inner'></span>
                <span class='onoffswitch-switch'></span>
            </label>`
            );
        });
    });
}

$('#roles').click(function() {
    location = window.location.origin + '/admin/users-of-roles/' + this.value;
});
