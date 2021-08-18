<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list">
            <thead>
                <tr>
                    <th class="text-center" style="width: 20px"><!--input type="checkbox" id="check_all">--></th>
                    <th class="text-center" style="width:100px">Control</th>
                    <th class="text-center">No.</th>
                    <th class="text-center" style="width: 150px">General Description</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Estimated Budget</th>
                    <th class="text-center">Procurement Mode</th>
                    @foreach ($months as $month)
                    <th class="text-center" width="">{{ $month }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($items as $item)
                <tr>
                    <td class="text-center"><input type="checkbox" class="" id="item_chkbox" value="{{ $item->id }}"></td>
                    <td class="text-center"><button class="btn btn-sm btn-warning" value="{{ $item->id }}" id="edit_qty" data-toggle="tooltip" data-placement="top" title="Edit Quantity"><i class="fas fa-edit"></i></button></td>
                    <td class="text-center">{{ $ctr++ }}</td>
                    <td class="text-center">{{ $item->itemname }}</td>
                    <td class="text-center">{{ $item->uom }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                    <td class="numerical-cols">{{ number_format($item->price * $item->quantity, 2) }}</td>
                    <td class="text-center">{{ $item->mode }}</td>
                    <td class="text-center"><input type="checkbox" id="January" {{ ($item->january) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="February" {{ ($item->february) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="March" {{ ($item->march) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="April" {{ ($item->april) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="May" {{ ($item->may) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="June" {{ ($item->june) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="July" {{ ($item->july) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="August" {{ ($item->august) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="September" {{ ($item->september) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="October" {{ ($item->october) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="November" {{ ($item->november) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="December" {{ ($item->december) ? 'checked="checked"' : '' }}></td>

                </tr>
                @endforeach
                
            </tbody>
        </table><br>
        <div class="float-right">
            <button type="button" class="btn btn-sm btn-success" id="add_proc_items">
                <i class="fas fa-plus mr-2"></i>Add Item to List
            </button>
            <button type="button" class="btn btn-sm btn-danger" id="remove_proc_items">
                <i class="fas fa-trash mr-2"></i>Delete Selected
            </button>
            <button type="button" class="btn btn-sm btn-primary" id="save_procurement">
                <i class="fas fa-cart-arrow-down mr-2"></i>Save Procurement
            </button>
        </div>
    </div>
</div>

<script>
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
                targets: [6, 7],
                className: 'numerical-cols'
            },
            {
                targets: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                className: 'text-center'
            }
        ]
    });
    var ctr = tbl_proc_list.rows().count();

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
                        $('td:eq(2)', $this).text(no);
                        no++;
                    });
                    ctr--;
                },
                cancel: function () {
                    
                }
            }
        });
    });

    $('#additemtolist').on('click', function(){
        var id = $('#itemname').val(),
        general_desc = $('#itemname').select2().find(":selected").data("itemname");
        qty = $('#qty').val(),
        price = $('#itemname').select2().find(":selected").data("unitprice");
        uom = $('#itemname').select2().find(":selected").data("uom");
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
        else if (mode === ''){
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

            var total = parseFloat(qty) * parseFloat(price);
            tbl_proc_list.row.add( [ '<input type="checkbox" class="" id="item_chkbox" value="' + id + '">',
                                    '<button class="btn btn-sm btn-danger mr-2 remove_btn" value="' + id + '" id="remove_from_list" data-toggle="tooltip" data-placement="top" title="Remove Item"><i class="fas fa-minus"></i></button>' +
                                    '<button class="btn btn-sm btn-warning" value="' + id + '" id="edit_qty" data-toggle="tooltip" data-placement="top" title="Edit Quantity"><i class="fas fa-edit"></i></button>',
                                        ++ctr, general_desc, uom, qty, numericFormat(price), numericFormat(total), mode, jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec ] ).draw();
            $('#modal_add_to_list').modal('hide');
        }
        
    })
</script>