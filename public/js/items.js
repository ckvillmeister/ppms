retrieveItemList(1);

$('#newItem').on('click', function(){
    $('#reset').click(); 
    $('#modal_new_item').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    getForm(0);
});

function retrieveItemList(status){
    request('items.retrieveItems',
                'POST', 
                {'status' : status},
                'HTML',
                '#itemlist',
                '#page_loading');
}

function getForm(itemid){
    request('items.getForm',
                'POST', 
                {'itemid' : itemid},
                'HTML',
                '#new_item_form',
                '#form_loading');
}