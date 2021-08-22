function message(title, color, content){
    $.alert({
        title: title,
        type: color,
        content: content
    })
}

function request(link, met, data, type, container = '', loading = ''){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: link,
        method: met,
        data: data,
        setCookies: token,
        dataType: type,
        beforeSend: function() {
            $(loading).html('<div class="overlay">' +
                    '<i class="fas fa-3x fa-sync-alt fa-spin"></i>' +
                    '<div class="text-bold pt-2">&nbsp;&nbsp;Loading...</div>' +
                        '</div>');
        },
        complete: function(){
            $(loading).html('');
        },
        success: function(result) {
            if (container){
                $(container).html(result);
            }
            else{
                if (result){
                    message(result['result'], result['color'], result['message']);

                    if (result['redirect']){
                        setTimeout(function(){ window.location = result['redirect'];}, 3000);
                    }
                }
            }
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function numericFormat(n) {
    var parts=n.toString().split(".");
    return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
}

$('#frmChangePass').on('submit', function(e){
    e.preventDefault();

    var newpass = $('#newpassword').val(),
        cnewpass = $('#cnewpassword').val();
        
    if (newpass != cnewpass){
        message('Error', 'red', 'Password does not match!');
    }
    else{
        request('accounts.resetpass', 'POST', $(this).serialize(), 'JSON');
    }

    $('#modal_change_password').modal('hide');
});
