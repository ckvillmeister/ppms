$('#txt_username').focus();

$('#btn_signin').on('click', function(){
    var username = $('#txt_username').val(),
        password = $('#txt_password').val();

    if (username == '' | password == ''){
        message("Empty", 'red', "Please provide user credentials!");
    }
    else{
        request('authenticate', 'POST', 
                {"username": username, "password": password},
                'JSON');
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