$('#txt_username').focus();

$('#btn_signin').on('click', function(){
    var username = $('#txt_username').val(),
        password = $('#txt_password').val();

    if (username == '' | password == ''){
        message("Empty", 'red', "Please provide user credentials!");
    }
    else{
        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/authenticate',
            method: 'POST',
            data: {'username': username,
                    'password': password
                    },
            setCookies: token,
            dataType: "JSON",
            beforeSend: function() {
                $('#basicloader').show();
            },
            complete: function(){
                $('#basicloader').hide();
            },
            success: function(result) {
                if (result.redirect){
                    $.alert({
                        title: 'Successful!',
                        type: 'green',
                        content: 'Login successful!',
                        autoClose: 'ok|2000'
                    });
                    setTimeout(function(){ $('#basicloader').show(); }, 2100);
                    setTimeout(function(){ window.location = result.redirect; }, 3000);
                }
                else{
                    message(result.result, result.color, result.message);
                }
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    }
})

$('#btn_forgot_pass').on('click', function(){
    message("Forgot Password", 'red', "Please remember your password!");
})

$('#txt_username').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == 13){
        $('#btn_signin').click();
    }
});

$('#txt_password').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == 13){
        $('#btn_signin').click();
    }
});