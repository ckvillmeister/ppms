$('#btn_signin').on('click', function(){
    var username = $('#txt_username').val(),
        password = $('#txt_password').val();

    if (username == '' | password == ''){
        message("Empty", 'red', "Please provide user credentials!");
    }
    else{
        request('authenticate', 'POST', 
                {"username": username, "password": password},
                'JSON',
                '',
                'dashboard');
    }
})

$('#btn_forgot_pass').on('click', function(){
    message("Forgot Password", 'red', "Please remember your password!");
})