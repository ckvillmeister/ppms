request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');

$('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('class_expenditures.getForm', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
});

$('#active').on('click', function(){
    request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
});

$('#inactive').on('click', function(){
    request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
});

$('body').on('click', '#edit', function(){
    var id = $(this).val(); 

    request('class_expenditures.getForm', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

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
        content: 'Are you sure you want to remove this class of expenditure?',
        buttons: {
            confirm: function () {
                request('class_expenditures.toggleStatus', 'POST', {'id' : id, 'status' : 0}, 'JSON');
                request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
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
        content: 'Are you sure you want to re-activate this class of expenditure?',
        buttons: {
            confirm: function () {
                request('class_expenditures.toggleStatus', 'POST', {'id' : id, 'status' : 1}, 'JSON');
                request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 0}, 'HTML', '#list', '#page_loading');
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('submit', '#frm', function(e){
    e.preventDefault();

    var class_exp_name = $('#class_exp_name').val();
        
    if (class_exp_name === ''){
        message('Error', 'red', 'Please provide class of expenditure name!');
    }
    else{
        request('class_expenditures.create', 'POST', $(this).serialize(), 'JSON');
        request('class_expenditures.retrieveClassExpenditures', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
        $('#modal_new').modal('hide');
    }
});