function message(title, color, content){
    $.alert({
        title: title,
        type: color,
        content: content
    })
}

function request(link, met, data, type, container = '', navigate = ''){
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
            $('.overlay-wrapper').html('<div class="overlay">' +
                    '<i class="fas fa-3x fa-sync-alt fa-spin"></i>' +
                    '<div class="text-bold pt-2">&nbsp;&nbsp;Loading...</div>' +
                        '</div>');
        },
        complete: function(){
            $('.overlay-wrapper').html('');
        },
        success: function(result) {
            if (container){
                $(container).html(result);
            }
            else if (navigate){
                message('Result', result['color'], result['message']);
                setTimeout(function(){ window.location = navigate;}, 3000);
            }
            else{
                message('Result', result['color'], result['message']);
            }
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}
