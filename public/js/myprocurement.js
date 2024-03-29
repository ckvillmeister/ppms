getItems();
retrieveProcurementList(0);
var id, general_desc, uom, price, ctr = 1;
var tbl_proc_list = $('#tbl_procurement_list').DataTable({
    "scrollX": true,
    "ordering": false,
    paging: false,
    styles: {
      tableHeader: {
        fontSize: 8
      }
    },
    'columnDefs': [
        {
            targets: [5, 6],
            className: 'numerical-cols'
            // 'createdCell':  function (td, data, rowData, row, col) {
            //       $(td).attr('id', data); 
            // }
        },
        {
            targets: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
            className: 'text-center'
        },
        {
            targets: 4,
            'createdCell':  function (td, data, rowData, row, col) {
                  $(td).attr('id', 'quantity-col'); 
            }
        }
    ]
  });

$('#go').on('click', function(){
    var year = $('#cbo_year').val();
    
    retrieveProcurementList(year);
});

$('#btn_create_new_item').on('click', function(){
    $('#reset').click(); 
    $('#classexp').val([]).trigger('change');
    $('#uom').val([]).trigger('change');
    $('#mode').val([]).trigger('change');
    $('#objexp').val([]).trigger('change');
    $('#category').val([]).trigger('change');
    $('#modal_create_new_item').modal({
                                    backdrop: 'static',
                                    keyboard: true, 
                                    show: true});
});

$('#reset').on('click', function(){
    $('#uom').val([]).trigger('change');
    $('#classexp').val([]).trigger('change');
    $('#objexp').val([]).trigger('change');
    $('#category').val([]).trigger('change');
});

$('body').on('click', '#addtolist', function(){
    id = $(this).val();
    general_desc = $(this).closest("tr").find('td:eq(1)').text();
    uom = $(this).closest("tr").find('td:eq(2)').text();
    price = $(this).closest("tr").find('td:eq(3)').text();

    $('#qty').val('');
    $('#mode').val([]).trigger('change');
    $('#displayname').text(general_desc);

    $('#modal_add_to_list').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});
});

$('body').on('click', '#remove_from_list', function(){
    var item = $(this);
    $.confirm({
        title: 'Confirm',
        type: 'blue',
        content: 'Are you sure you want to remove this item?',
        buttons: {
            confirm: function () {
                tbl_proc_list.row( $(item).parents('tr') )
                    .remove()
                    .draw();

                var no = 1;
                $('#tbl_procurement_list tbody').find('tr').each(function(){
                    var $this = $(this);
                    $('td:eq(1)', $this).text(no);
                    no++;
                });
                ctr--;
            },
            cancel: function () {
                
            }
        }
    });
});

$('body').on('click', '#permanently_delete', function(){
    var item = $(this);
    $.confirm({
        title: 'Confirm',
        type: 'blue',
        content: 'This is an irreversible action. Are you sure you want to permanently remove this item?',
        buttons: {
            confirm: function () {
                $.ajax({
                    headers: {
                        'x-csrf-token': tkn
                    },
                    url: '/procurement.toggleProcurementItem',
                    method: 'POST',
                    data: {'itemid' : item.val(), 'status' : 0, 'deptid' : 0},
                    dataType: 'HTML',
                    success: function(result) {
                      if (result == 1){
                        tbl_proc_list.row( $(item).parents('tr') )
                            .remove()
                            .draw();

                        var no = 1;
                        $('#tbl_procurement_list tbody').find('tr').each(function(){
                            var $this = $(this);
                            $('td:eq(1)', $this).text(no);
                            no++;
                        });
                        ctr--;
                      }
                      else if(result == 2){
                        message('Warning', 'red', 'This procurement was already approved! Therefore it cannot be modified.');
                      }
                      else if(result == 3){
                        message('Warning', 'red', 'Procurement planning for this year is already close!');
                      }
                      else{
                        message('Error', 'red', 'Error during processing!');
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
                var price = row.find('td:eq(5)').text();

                var total = parseFloat(newqty) * parseFloat(price);
                row.find('td:eq(4)').text(newqty);
                row.find('td:eq(6)').text(numericFormat(total));
            },
            cancel: function () {
                
            }
        }
    });
});

$('#additemtolist').on('click', function(){
    var qty = $('#qty').val(),
        mode = $('#mode').val(),
        jan = "<input type='checkbox' id='January'>", 
        feb = "<input type='checkbox' id='February'>",
        mar = "<input type='checkbox' id='March'>",
        apr = "<input type='checkbox' id='April'>",
        may = "<input type='checkbox' id='May'>",
        jun = "<input type='checkbox' id='June'>",
        jul = "<input type='checkbox' id='July'>",
        aug = "<input type='checkbox' id='August'>",
        sep = "<input type='checkbox' id='September'>",
        oct = "<input type='checkbox' id='October'>",
        nov = "<input type='checkbox' id='November'>",
        dec = "<input type='checkbox' id='December'>";

    if (qty === 0 | qty === '' | parseInt(qty) < 1){
        message('Error', 'red', 'Please enter a valid quantity!');
    }
    else if (mode === '' | mode === null){
        message('Error', 'red', 'Please select mode of procurement!');
    }
    else if (isItemExist(id)){
        message('Error', 'red', 'Item already in the list!');
    }
    else{
        $('#MonthsList input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).val() == 'January'){
                    jan = "<input type='checkbox' id='January' checked='checked'>";
                }
                else if ($(this).val() == 'February'){
                    feb = "<input type='checkbox' id='February' checked='checked'>";
                }
                else if ($(this).val() == 'March'){
                    mar = "<input type='checkbox' id='March' checked='checked'>";
                }
                else if ($(this).val() == 'April'){
                    apr = "<input type='checkbox' id='April' checked='checked'>";
                }
                else if ($(this).val() == 'May'){
                    may = "<input type='checkbox' id='May' checked='checked'>";
                }
                else if ($(this).val() == 'June'){
                    jun = "<input type='checkbox' id='June' checked='checked'>";
                }
                else if ($(this).val() == 'July'){
                    jul = "<input type='checkbox' id='July' checked='checked'>";
                }
                else if ($(this).val() == 'August'){
                    aug = "<input type='checkbox' id='August' checked='checked'>";
                }
                else if ($(this).val() == 'September'){
                    sep = "<input type='checkbox' id='September' checked='checked'>";
                }
                else if ($(this).val() == 'October'){
                    oct = "<input type='checkbox' id='October' checked='checked'>";
                }
                else if ($(this).val() == 'November'){
                    nov = "<input type='checkbox' id='November' checked='checked'>";
                }
                else if ($(this).val() == 'December'){
                    dec = "<input type='checkbox' id='December' checked='checked'>";
                }
            }
        });
        
        var total = parseFloat(qty) * parseFloat(price.replace(/,/g, ''));
        tbl_proc_list.row.add( [ '<button class="btn btn-sm btn-danger mr-2 remove_btn" value="' + id + '" id="remove_from_list" data-toggle="tooltip" data-placement="top" title="Remove Item"><i class="fas fa-minus"></i></button>' +
                                    '<button class="btn btn-sm btn-warning" value="' + id + '" id="edit_qty" data-toggle="tooltip" data-placement="top" title="Edit Quantity"><i class="fas fa-edit"></i></button>',
                                    ctr, general_desc, uom, qty, numericFormat(price), numericFormat(total), mode, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec ] ).draw();
        ctr++;
        $('#modal_add_to_list').modal('hide');
    }
});

$('#frm_create_new_item').on('submit', function(e){
    e.preventDefault();

    var name = $('#itemname').val(),
        desc = $('#itemdesc').val(),
        price = $('#itemprice').val(),
        uom = $('#uom').val(),
        objexp = $('#objexp').val(),
        category = $('#category').val();
        
    if (name === '' | name === null){
        message('Error', 'red', 'Please provide item name!');
    }
    else if (price === '' | price === null){
        message('Error', 'red', 'Please provide item price!');
    }
    else if (uom === '' | uom === null){
        message('Error', 'red', 'Please select unit of measurement!');
    }
    else if (objexp === '' | objexp === null){
        message('Error', 'red', "Please select item's object of expenditure!");
    }
    else if (category === '' | category === null){
        message('Error', 'red', "Please select item's category!");
    }
    else{
        request('items.create', 'POST', $(this).serialize(), 'JSON');
        getItems();
    }
});

$('#save_procurement').on('click', function(){
    var procurementlist = [], i = 0;

    if (tbl_proc_list.rows().count() <= 0){
        message("Error", "red", "Procurement list is empty!");
    }
    else{
        $('#tbl_procurement_list tbody').find('tr').each(function(){
            var itemid = $(this).closest('tr').find('#edit_qty').val(),
                itemname = $(this).closest('tr').find('td:eq(2)').text(),
                qty = $(this).closest('tr').find('td:eq(4)').text(),
                price = $(this).closest('tr').find('td:eq(5)').text(),
                mode = $(this).closest('tr').find('td:eq(7)').text();
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
            
            procurementlist[i] = [itemid, itemname, qty, price, mode, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec];
            i++;
        });
        //console.log(procurementlist);
        request('procurement.create',
                    'POST', 
                    {'list': procurementlist},
                    'JSON',
                    null,
                    '#page_loading');
        retrieveProcurementList(0);
    }
});

function getItems(){
    request('myprocurementRetrieveItems', 'POST', 
                null,
                'HTML',
                '#item_list',
                '#itemlist_loading');
}

function isItemExist(itemid){
	var flag = false;

	$('#tbl_procurement_list #edit_qty').each(function(){
	    if(itemid == $(this).val()){
	        flag = true;
	    }
	});

	if(flag){
	  return true;
	}
	else{
	  return false;
	}
}

function retrieveProcurementList(year){
    ctr = 1;
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: 'procurement.retrieveProcurementList',
        method: 'POST',
        data: {"year": year},
        setCookies: token,
        dataType: 'JSON',
        beforeSend: function() {
            $('#proclist_loading').html('<div class="overlay">' +
                    '<i class="fas fa-3x fa-sync-alt fa-spin"></i>' +
                    '<div class="text-bold pt-2">&nbsp;&nbsp;Loading...</div>' +
                        '</div>');
        },
        complete: function(){
            $('#proclist_loading').html('');
        },
        success: function(result) {
            tbl_proc_list.clear().draw();
            $.each(result, function( index, value ) {
                var jan = "<input type='checkbox' id='January'>", 
                    feb = "<input type='checkbox' id='February'>",
                    mar = "<input type='checkbox' id='March'>",
                    apr = "<input type='checkbox' id='April'>",
                    may = "<input type='checkbox' id='May'>",
                    jun = "<input type='checkbox' id='June'>",
                    jul = "<input type='checkbox' id='July'>",
                    aug = "<input type='checkbox' id='August'>",
                    sep = "<input type='checkbox' id='September'>",
                    oct = "<input type='checkbox' id='October'>",
                    nov = "<input type='checkbox' id='November'>",
                    dec = "<input type='checkbox' id='December'>";
                
                if (value.january == 1){
                    jan = "<input type='checkbox' id='January' checked='checked'>";
                }
                if (value.february == 1){
                    feb = "<input type='checkbox' id='February' checked='checked'>";
                }
                if (value.march == 1){
                    mar = "<input type='checkbox' id='March' checked='checked'>";
                }
                if (value.april == 1){
                    apr = "<input type='checkbox' id='April' checked='checked'>";
                }
                if (value.may == 1){
                    may = "<input type='checkbox' id='May' checked='checked'>";
                }
                if (value.june == 1){
                    jun = "<input type='checkbox' id='June' checked='checked'>";
                }
                if (value.july == 1){
                    jul = "<input type='checkbox' id='July' checked='checked'>";
                }
                if (value.august == 1){
                    aug = "<input type='checkbox' id='August' checked='checked'>";
                }
                if (value.september == 1){
                    sep = "<input type='checkbox' id='September' checked='checked'>";
                }
                if (value.october == 1){
                    oct = "<input type='checkbox' id='October' checked='checked'>";
                }
                if (value.november == 1){
                    nov = "<input type='checkbox' id='November' checked='checked'>";
                }
                if (value.december == 1){
                    dec = "<input type='checkbox' id='December' checked='checked'>";
                }

                var button_delete = '';

                if (value.is_allowed_to_remove){
                    button_delete = '<button class="btn btn-sm btn-danger mr-2 remove_btn" value="' + value.id + '" id="permanently_delete" data-toggle="tooltip" data-placement="top" title="Permanently Remove Item"><i class="fas fa-trash"></i></button>';
                }

                tbl_proc_list.row.add( [ button_delete +
                                    '<button class="btn btn-sm btn-warning" value="' + value.itemid + '" id="edit_qty" data-toggle="tooltip" data-placement="top" title="Edit Quantity"><i class="fas fa-edit"></i></button>',
                                    ctr, 
                                    value.itemname,
                                    value.uom, 
                                    value.quantity, 
                                    numericFormat(value.price), 
                                    numericFormat(parseFloat(value.quantity) * parseFloat(value.price)), 
                                    value.mode, 
                                    jan, 
                                    feb, 
                                    mar, 
                                    apr, 
                                    may, 
                                    jun, 
                                    jul, 
                                    aug, 
                                    sep, 
                                    oct, 
                                    nov, 
                                    dec ] ).draw();
                ctr++;
            });
            
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
}