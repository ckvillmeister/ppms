request('categories.retrieveCategories', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('categories.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('categories.retrieveCategories', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('categories.retrieveCategories', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('categories.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
                request('categories.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('categories.retrieveCategories', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
                request('categories.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('categories.retrieveCategories', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
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
        request('categories.create', 'POST', $(this).serialize(), 'JSON');
        request('categories.retrieveCategories', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
        $('#modal_new').modal('hide');
    }
});