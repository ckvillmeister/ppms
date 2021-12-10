retrieveRoles(1);

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('/roles/getform', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    retrieveRoles(1);
});

$('#inactive').on('click', function(){
    retrieveRoles(0);
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('/roles/getform', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to re-activate this role?',
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

    var role = $('#role').val();
        
    if (role === ''){
        message('Error', 'red', 'Please provide role name!');
    }
    else{
        create($(this).serialize());
    }
});

function create(frm){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/roles/create',
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
            retrieveRoles(1);
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
        url: '/roles/togglestatus',
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

            retrieveRoles(stat);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function retrieveRoles(status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/roles/retrieveroles',
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