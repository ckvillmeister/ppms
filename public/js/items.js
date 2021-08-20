request('itemsRetrieveItems', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

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

$('body').on('submit', '#frm', function(e){
    e.preventDefault();

    var name = $('#itemname').val(),
        desc = $('#itemdesc').val(),
        price = $('#itemprice').val(),
        uom = $('#uom').val(),
        objexp = $('#objexp').val(),
        category = $('#category').val();
        
    if (name === ''){
        message('Error', 'red', 'Please provide item name!');
    }
    else if (price === ''){
        message('Error', 'red', 'Please provide item price!');
    }
    else if (uom === ''){
        message('Error', 'red', 'Please select unit of measurement!');
    }
    else if (objexp === ''){
        message('Error', 'red', "Please select item's object of expenditure!");
    }
    else{
        request('items.create', 'POST', $(this).serialize(), 'JSON');
        $('#modal_new').modal('hide');
        request('itemsRetrieveItems', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
    }
});