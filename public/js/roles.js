request('roles.retrieveRoles', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('roles.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('roles.retrieveRoles', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('roles.retrieveRoles', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('roles.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to remove this role?',
        buttons: {
            confirm: function () {
                request('roles.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('roles.retrieveRoles', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
        content: 'Are you sure you want to re-activate this role?',
        buttons: {
            confirm: function () {
                request('roles.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('roles.retrieveRoles', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('submit', '#frm', function(e){
    e.preventDefault();

    var role = $('#role').val();
        
    if (role === ''){
        message('Error', 'red', 'Please provide role name!');
    }
    else{
        request('roles.create', 'POST', $(this).serialize(), 'JSON');
        request('roles.retrieveRoles', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
        $('#modal_new').modal('hide');
    }
});