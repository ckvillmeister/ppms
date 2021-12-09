retrieveItems(1, 100);

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('items.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('itemsRetrieveItems', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('itemsRetrieveItems', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('items.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to remove this item?',
        buttons: {
            confirm: function () {
                request('items.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('itemsRetrieveItems', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
        content: 'Are you sure you want to re-activate this item?',
        buttons: {
            confirm: function () {
                request('items.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('itemsRetrieveItems', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('submit', '#frm_create_new_item', function(e){
    e.preventDefault();

    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/items.create',
        method: 'POST',
        data: $('#frm_create_new_item').serialize(),
        dataType: 'HTML',
    success: function(result) {
    if (result == 1){
        message('Saved', 'green', "Item successfully saved!");
        retrieveItems(1, 100);
        $('#modal_new').modal('hide');
    }
    else if (result == 2){
        message('Updated', 'green', "Item successfully updated!");
        retrieveItems(1, 100);
        $('#modal_new').modal('hide');
    }
    else{
        $.confirm({
            boxWidth: '50%',
            useBootstrap: false,
            title: 'Similar Items',
            type: 'blue',
            content: result,
            buttons: {
                confirm: function () {
                $.ajax({
                    headers: {
                        'x-csrf-token': token
                    },
                    url: '/items.create',
                    method: 'POST',
                    data: $("#frm_create_new_item").serialize() + '&confirm=1',
                    dataType: 'HTML',
                    success: function(result) {
                    if (result == 1){
                        message('Saved', 'green', "Item successfully saved!");
                        retrieveItems(1, 100);
                        $('#modal_new').modal('hide');
                    }
                    else if (result == 2){
                        message('Updated', 'green', "Item successfully updated!");
                        retrieveItems(1, 100);
                        $('#modal_new').modal('hide');
                    }
                    else{
                        message('Error', 'red', "Error during processing!");
                    }
                    },
                    error: function(obj, msg, exception){
                        message('Error', 'red', msg + ": " + obj.status + " " + exception);
                    }
                })
                },
                cancel: function () {
                    
                }
            }
            });
        }
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
});

function retrieveItems(status, limit){
    request('itemsRetrieveItems', 'POST', {'status' : status, 'limit': limit}, 'HTML', '#list', '#page_loading');
}