retrieveCategories(1);

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('/categories/getform', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    retrieveCategories(1);
});

$('#inactive').on('click', function(){
    retrieveCategories(0);
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('/categories/getform', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to remove this category?',
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
        content: 'Are you sure you want to re-activate this category?',
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

    var office_name = $('#office_name').val(),
        description = $('#description').val(),
        head = $('#office_head').val();
        
    if (office_name === ''){
        message('Error', 'red', 'Please provide abbreviated name of office!');
    }
    else if (description === ''){
        message('Error', 'red', 'Please provide full office description!');
    }
    else if (head === ''){
        message('Error', 'red', 'Please provide head of office!');
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
        url: '/categories/create',
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
            retrieveCategories(1);
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
        url: '/categories/togglestatus',
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

            retrieveCategories(stat);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function retrieveCategories(status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/categories/retrievecategories',
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