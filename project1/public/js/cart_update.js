function updateCart(id, alertNoUpdate)
{
    if($('#qty' + id).val() < 0) {
        alert(alertNoUpdate);
        return false;
    }
    $(document).ready(function() {
        $.ajax({
            url: window.location.origin + '/cart-update/' + id,
            type: 'get',
            data: {
                qty: $('#qty' + id).val()
            },
            dataType: 'json'
        }).done(function (result) {
            $('#qty' + id).val(result[0].qty);
            $('#money' + id).html('<td>' + result[0].qty * result[0].price + '</td>')
            $('#total').html('<td>&#58;&nbsp;' + result[1].subtotal + '</span>')
            $('#count-products').html('<span>&#58;&nbsp;' + result[2].count + '</span>');
            $('#count-cart').html('<span>' + result[2].count + '</span>')
        });
    });
}
