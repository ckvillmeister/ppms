retrieveAccounts(1);

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});
    
    $('#password_field').addClass('visible');
    request('/accounts/getform', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    retrieveAccounts(1);
});

$('#inactive').on('click', function(){
    retrieveAccounts(0);
});

$('body').on('click', '#changepass', function(){
    $('#reset').click(); 
    var id = $(this).val(); 
    $('#resetpassid').val(id);
    $('#modal_reset_password').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    $('#password_field').addClass('invisible');
    request('/accounts/getform', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});
});

$('body').on('click', '#delete', function(){
    var id = $(this).val();

    $.confirm({
        title: 'Confirm',
        type: 'blue',
        content: 'Are you sure you want to delete this user account?',
        buttons: {
            confirm: function () {
                toggleStatus(id, 0);
            },
            cancel: function () {
                
            }
        }
    });
    
});

$('body').on('click', '#reactivate', function(){
    var id = $(this).val(); 
    
    $.confirm({
        title: 'Confirm',
        type: 'blue',
        content: 'Are you sure you want to re-activate this user account?',
        buttons: {
            confirm: function () {
                toggleStatus(id, 1);
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('submit', '#frm', function(e){
    e.preventDefault();

    var firstname = $('#firstname').val(),
        lastname = $('#lastname').val(),
        username = $('#username').val(),
        password = $('#password').val(),
        department = $('#department').val(),
        role = $('#role').val(),
        id = $('#id').val();

        
    if (firstname === '' | lastname === ''){
        message('Error', 'red', "Please provide user's complete name!");
    }
    else if (username === ''){
        message('Error', 'red', 'Please provide username!');
    }
    else if (department === ''){
        message('Error', 'red', 'Please select a department!');
    }
    else if (role === ''){
        message('Error', 'red', 'Please provide user role!');
    }
    else{
        if (id){
            create($(this).serialize());
        }
        else{
            if (password === ''){
                message('Error', 'red', 'Please provide user password!');
            }
            else{
                create($(this).serialize());
            }
        }
        
    }
});

$('body').on('submit', '#reset_pass_frm', function(e){
    e.preventDefault();

    var newpassword = $('#newpassword').val(),
        confirmpassword = $('#confirmpassword').val();

        
    if (newpassword === ''){
        message('Error', 'red', "Please provide new password!");
    }
    else if (confirmpassword === ''){
        message('Error', 'red', 'Please provide confirm password!');
    }
    else if (confirmpassword != newpassword){
        message('Error', 'red', 'Password does not match!');
    }
    else{
        request('/accounts/resetpass', 'POST', $(this).serialize(), 'JSON');
        $('#modal_reset_password').modal('hide');
    }
});

function create(frm){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/accounts/create',
        method: 'POST',
        data: frm,
        setCookies: token,
        dataType: "JSON",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            $('#modal_new').modal('hide');
            message(result['result'], result['color'], result['message']);
            retrieveAccounts(1);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function toggleStatus(id, status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/accounts/togglestatus',
        method: 'POST',
        data: {'id' : id, 'status' : status},
        setCookies: token,
        dataType: "HTML",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            var stat = 0;

            if (status == 1){
                stat = 0;
            }
            else if (status == 0){
                stat = 1;
            }

            retrieveAccounts(stat);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function retrieveAccounts(status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/accounts/retrieveaccounts',
        method: 'POST',
        data: {'status': status},
        setCookies: token,
        dataType: "HTML",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            $('#list').html(result);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}