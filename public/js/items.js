retrieveItems(1, 0);

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('/items/getform', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    retrieveItems(1, 0);
});

$('#inactive').on('click', function(){
    retrieveItems(0, 0);
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('/items/getform', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to re-activate this item?',
        buttons: {
            confirm: function () {
                toggleStatus(id, 1);
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
        url: '/items/create',
        method: 'POST',
        data: $('#frm_create_new_item').serialize(),
        dataType: 'HTML',
        success: function(result) {
        if (result == 1){
            message('Saved', 'green', "Item successfully saved!");
            retrieveItems(1, 0);
            $('#modal_new').modal('hide');
        }
        else if (result == 2){
            message('Updated', 'green', "Item successfully updated!");
            retrieveItems(1, 0);
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
                        url: '/items/create',
                        method: 'POST',
                        data: $("#frm_create_new_item").serialize() + '&confirm=1',
                        dataType: 'HTML',
                        success: function(result) {
                        if (result == 1){
                            message('Saved', 'green', "Item successfully saved!");
                            retrieveItems(1, 0);
                            $('#modal_new').modal('hide');
                        }
                        else if (result == 2){
                            message('Updated', 'green', "Item successfully updated!");
                            retrieveItems(1, 0);
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

function toggleStatus(id, status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/items/togglestatus',
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

            retrieveItems(stat, 0);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}

function retrieveItems(status, limit){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/itemsRetrieveItems',
        method: 'POST',
        data: {'status': status, 'limit': limit},
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