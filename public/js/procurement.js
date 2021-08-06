getItems();

$('#btn_create_new_item').on('click', function(){
    $('#modal_create_new_item').modal({
                                    backdrop: 'static',
                                    keyboard: true, 
                                    show: true});
});

function getItems(){
    request('items', 'GET', 
                null,
                'HTML',
                '#item_list',
                null);
}