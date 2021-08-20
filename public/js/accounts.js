request('accounts.retrieveAccounts', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});
    
    $('#password_field').addClass('visible');
    request('accounts.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('accounts.retrieveAccounts', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('accounts.retrieveAccounts', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
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
    request('accounts.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
                request('accounts.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('accounts.retrieveAccounts', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
                request('accounts.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('accounts.retrieveAccounts', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
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
            request('accounts.create', 'POST', $(this).serialize(), 'JSON');
            request('accounts.retrieveAccounts', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
            $('#modal_new').modal('hide');
        }
        else{
            if (password === ''){
                message('Error', 'red', 'Please provide user password!');
            }
            else{
                request('accounts.create', 'POST', $(this).serialize(), 'JSON');
                request('accounts.retrieveAccounts', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
                $('#modal_new').modal('hide');
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
        request('accounts.resetpass', 'POST', $(this).serialize(), 'JSON');
        $('#modal_reset_password').modal('hide');
    }
});