request('units.retrieveUnits', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('units.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('units.retrieveUnits', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('units.retrieveUnits', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('units.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to remove this unit?',
        buttons: {
            confirm: function () {
                request('units.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('units.retrieveUnits', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
        content: 'Are you sure you want to re-activate this unit?',
        buttons: {
            confirm: function () {
                request('units.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('units.retrieveUnits', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('submit', '#frm', function(e){
    e.preventDefault();

    var uom = $('#uom').val(),
        description = $('#description').val();
        
    if (uom === ''){
        message('Error', 'red', 'Please provide abbreviated unit of measurement!');
    }
    else if (description === ''){
        message('Error', 'red', 'Please provide unit of measurement description!');
    }
    else{
        request('units.create', 'POST', $(this).serialize(), 'JSON');
        request('units.retrieveUnits', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
        $('#modal_new').modal('hide');
    }
});