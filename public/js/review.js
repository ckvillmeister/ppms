$('#go').on('click', function(){
    var dept = $('#cbo_departments').val();
    retrieveProcurementList(dept);
});

$('body').on('click', '#edit_qty', function(){
    var rowindex = $(this).parent().parent().index();
    var row = $(this).parent().parent();
    
    $.confirm({
        title: 'New Quantity',
        type: 'blue',
        content: '<input type="text" class="form-control form-control-sm" id="new_qty">',
        buttons: {
            ok: function () {
                var newqty = $('#new_qty').val();
                var price = row.find('td:eq(6)').text();

                var total = parseFloat(newqty) * parseFloat(price);
                row.find('td:eq(5)').text(newqty);
                row.find('td:eq(7)').text(numericFormat(total));
            },
            cancel: function () {
                
            }
        }
    });
});

$('#remove_proc_items').on('click', function(){
    var itemlist = [], ctr = 0, dept = $('#cbo_departments').val();

    $.confirm({
        title: 'Confirm',
        type: 'blue',
        content: 'This is an irreversible action. Are you sure you want to remove all the selected item?',
        buttons: {
            confirm: function () {
                $('#tbl_procurement_list tbody').find('tr').each(function(){
                    var proc_item_id = $(this).closest('tr').find('#item_chkbox').val();
            
                    if ($(this).closest('tr').find('#item_chkbox').is(":checked")){
                        itemlist[ctr] = proc_item_id;
                        ctr++;
                    }
            
                });
            
                request('review.removeItemFromProcList',
                            'POST', 
                            {'itemlist' : itemlist, 'dept' : dept},
                            'JSON',
                            null,
                            '#page_loading');
            
                retrieveProcurementList(dept);
            },
            cancel: function () {
                
            }
        }
    });
});

$('#save_procurement').on('click', function(){
    var procurementlist = [], i = 0, dept = $('#cbo_departments').val();
    $('#tbl_procurement_list tbody').find('tr').each(function(){
        var proc_item_id = $(this).closest('tr').find('#item_chkbox').val(),
            itemname = $(this).closest('tr').find('td:eq(3)').text(),
            qty = $(this).closest('tr').find('td:eq(5)').text(),
            price = $(this).closest('tr').find('td:eq(6)').text(),
            mode = $(this).closest('tr').find('td:eq(8)').text();
        var jan = 0, feb = 0, mar = 0, apr = 0, may = 0, jun = 0, jul = 0, aug = 0, sep = 0, oct = 0, nov = 0, dec = 0;
        
        if ($(this).find('#January').is(":checked")){
            jan = 1;
        }
        if ($(this).find('#February').is(":checked")){
            feb = 1;
        }
        if ($(this).find('#March').is(":checked")){
            mar = 1;
        }
        if ($(this).find('#April').is(":checked")){
            apr = 1;
        }
        if ($(this).find('#May').is(":checked")){
            may = 1;
        }
        if ($(this).find('#June').is(":checked")){
            jun = 1;
        }
        if ($(this).find('#July').is(":checked")){
            jul = 1;
        }
        if ($(this).find('#August').is(":checked")){
            aug = 1;
        }
        if ($(this).find('#September').is(":checked")){
            sep = 1;
        }
        if ($(this).find('#October').is(":checked")){
            oct = 1;
        }
        if ($(this).find('#November').is(":checked")){
            nov = 1;
        }
        if ($(this).find('#December').is(":checked")){
            dec = 1;
        }
        
        procurementlist[i] = [proc_item_id, itemname, qty, price, mode, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec];
        i++;
    });

    request('review.updateProcItems',
                'POST', 
                {'list': procurementlist},
                'JSON',
                null,
                '#page_loading');
    
    retrieveProcurementList(dept);
});

function retrieveProcurementList(dept){
    request('review.proclist',
                'POST', 
                {'dept' : dept},
                'HTML',
                '#procurement_review_list',
                '#page_loading');
}