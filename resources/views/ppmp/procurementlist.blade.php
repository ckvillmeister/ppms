<table class="table table-sm table-bordered display bg-white" id="tbl_procurement_list" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center text-xs">No.</th>
            <th class="text-center text-xs">AIP Ref. Code</th>
            <th class="text-center text-xs">General Description</th>
            <th class="text-center text-xs">Unit</th>
            <th class="text-center text-xs">Qty</th>
            <th class="text-center text-xs">Price</th>
            <th class="text-center text-xs">Estimated Budget</th>
            <th class="text-center text-xs">Procurement Mode</th>
            @foreach ($months as $key => $month)
            <th class="text-center text-xs" width="">{{ $key }}</th>
            @endforeach
            <th class="text-center text-xs">Control</th>
        </tr>
    </thead>
    <tbody>
        @if ($items)
            @php ($ctr = 1)
            @foreach ($objects as $object)
                <tr class="bg-light">
                    <td colspan="21"><span class="text-xs">{{ $object->object()->where('id', $object->object)->first()->obj_exp_name }}</span></td>
                </tr>
                @php ($jan = 0.0)
                @php ($feb = 0.0)
                @php ($mar = 0.0)
                @php ($apr = 0.0)
                @php ($may = 0.0)
                @php ($jun = 0.0)
                @php ($jul = 0.0)
                @php ($aug = 0.0)
                @php ($sep = 0.0)
                @php ($oct = 0.0)
                @php ($nov = 0.0)
                @php ($dec = 0.0)
                @php ($total_per_object = 0)
                @foreach ($items as $item)
                    @if ($object->object == $item->object)
                        @php ($jan += ($item->january) ? $item->january * $item->price : 0)
                        @php ($feb += ($item->february) ? $item->february * $item->price : 0)
                        @php ($mar += ($item->march) ? $item->march * $item->price : 0)
                        @php ($apr += ($item->april) ? $item->april * $item->price : 0)
                        @php ($may += ($item->may) ? $item->may * $item->price : 0)
                        @php ($jun += ($item->june) ? $item->june * $item->price : 0)
                        @php ($jul += ($item->july) ? $item->july * $item->price : 0)
                        @php ($aug += ($item->august) ? $item->august * $item->price : 0)
                        @php ($sep += ($item->september) ? $item->september * $item->price : 0)
                        @php ($oct += ($item->october) ? $item->october * $item->price : 0)
                        @php ($nov += ($item->november) ? $item->november * $item->price : 0)
                        @php ($dec += ($item->december) ? $item->december * $item->price : 0)
                        @php ($total_per_object += ($item->price * $item->quantity))
                        <tr data-id="{{ $item->id }}">
                            <td class="text-xs text-center">{{ $ctr++ }}</td>
                            <td class="text-xs text-center">{{ ($object->aipcode()->where('year', $object->year)->first()   ) ? $object->aipcode()->where('year', $object->year)->first()->aipcode : '' }}</td>
                            <td class="text-xs" style="cursor: pointer; white-space: pre-wrap">{{ $item->itemname }}</td>
                            <td class="text-xs text-center" style="cursor: pointer;">{{ $item->unit }}</td>
                            <td class="text-xs text-center" style="cursor: pointer;">{{ $item->quantity }}</td>
                            <td class="text-xs text-right" style="cursor: pointer;">{{ number_format($item->price, 2) }}</td>
                            <td class="text-xs text-right">{{ number_format(($item->price * $item->quantity), 2) }}</td>
                            <td class="text-xs text-center" style="cursor: pointer">{{ $item->mode }}</td>
                            @foreach ($months as $key => $month)
                                @if (strtolower($month) == 'january')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->january }}">
                                    {{ ($item->january) ? number_format((floatval($item->january) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'february')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->february }}">
                                    {{ ($item->february) ? number_format((floatval($item->february) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'march')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->march }}">
                                    {{ ($item->march) ? number_format((floatval($item->march) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'april')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->april }}">
                                    {{ ($item->april) ? number_format((floatval($item->april) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'may')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->may }}">
                                    {{ ($item->may) ? number_format((floatval($item->may) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'june')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->june }}">
                                    {{ ($item->june) ? number_format((floatval($item->june) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'july')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->july }}">
                                    {{ ($item->july) ? number_format((floatval($item->july) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'august')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->august }}">
                                    {{ ($item->august) ? number_format((floatval($item->august) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'september')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->september }}">
                                    {{ ($item->september) ? number_format((floatval($item->september) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'october')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->october }}">
                                    {{ ($item->october) ? number_format((floatval($item->october) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'november')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->november }}">
                                    {{ ($item->november) ? number_format((floatval($item->november) * $item->price), 2) : '' }}
                                    </td>
                                @elseif (strtolower($month) == 'december')
                                    <td class="text-xs text-right" style="cursor: pointer;" data-qty="{{ $item->december }}">
                                    {{ ($item->december) ? number_format((floatval($item->december) * $item->price), 2) : '' }}
                                    </td>
                                @endif
                            @endforeach
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger" onclick="deletePPMPItem({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Delete PPMP Item"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr class="bg-light">
                    <td class="text-xs" colspan="6">Total:</td>
                    <td class="text-xs text-right"><strong>{{ number_format($total_per_object, 2) }}</strong></td>
                    <td class="text-xs"></td>
                    <td class="text-xs text-right"><strong>{{ ($jan) ? number_format($jan, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($feb) ? number_format($feb, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($mar) ? number_format($mar, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($apr) ? number_format($apr, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($may) ? number_format($may, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($jun) ? number_format($jun, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($jul) ? number_format($jul, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($aug) ? number_format($aug, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($sep) ? number_format($sep, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($oct) ? number_format($oct, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($nov) ? number_format($nov, 2) : '' }}</strong></td>
                    <td class="text-xs text-right"><strong>{{ ($dec) ? number_format($dec, 2) : '' }}</strong></td>
                    <td class="text-xs"></td>

                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="float-right">
            <button class="btn btn-sm btn-primary" id="new-item"><i class="fas fa-plus mr-2"></i>New</button>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_item_list" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Item List</h5>
      </div>
      <div class="modal-body">

        <div id="listitems"></div>

      </div>
      <div class="modal-footer">
        <div class="float-right">
            <button type="button" class="btn btn-sm btn-danger" id="btn-close-procurement" data-dismiss="modal" style="width:150px"><i class="fas fa-window-close mr-2"></i>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    var selected_col_index, selected_row_index, selected_id;

    // var tbl_proc_list = $('#tbl_procurement_list').DataTable({
    //     "scrollX": true,
    //     "ordering": false,
    //     paging: false,
    //     styles: {
    //     tableHeader: {
    //         fontSize: 8
    //     }
    //     },
    //     'columnDefs': [
    //         {
    //             targets: [5, 6],
    //             className: 'numerical-cols'
    //             // 'createdCell':  function (td, data, rowData, row, col) {
    //             //       $(td).attr('id', data); 
    //             // }
    //         },
    //         {
    //             targets: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19],
    //             className: 'text-center'
    //         },
    //         {
    //             targets: 4,
    //             'createdCell':  function (td, data, rowData, row, col) {
    //                 $(td).attr('id', 'quantity-col'); 
    //             }
    //         }
    //     ]
    // });

    $('#objects').select2({dropdownCssClass: "font"});

    $('#new-item').on('click', function(){
        var object = $('#objects').val();

        if (object == '' || object == 0){
            message('Error', 'red', "Please select object of expenditure first!");
        }
        else{
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/getnewprocurementform',
                method: 'POST',
                dataType: 'HTML',
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    $('#tbl_procurement_list').append(result);
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    });

    $('#tbl_procurement_list tbody td').dblclick(function() {
        var td = $(this),
            colindex = $(this).index(),
            rowindex = $(this).closest('tr').index(),
            id = $(this).closest('tr').attr('data-id'),
            attribute = '',
            title = '',
            content = '';
        
        if (jQuery.inArray(colindex, [4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]) !== -1){
            if (colindex == 4){
                title = "Enter New Quantity";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "quantity";
            }
            else if (colindex == 5){
                title = "Enter New Price";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "price";
            }
            else if (colindex == 7){
                title = "Select New Mode of Procurement";
                content = "<select class='form form-control' id='txt-field' autofocus>@foreach($mode as $m) <option value='{{ $m }}'>{{ $m }}</option> @endforeach</select>";
                attribute = "mode";
            }
            else if (colindex == 8){
                title = "Enter New Quantity for Month of January";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "january";
            }
            else if (colindex == 9){
                title = "Enter New Quantity for Month of February";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "february";
            }
            else if (colindex == 10){
                title = "Enter New Quantity for Month of March";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "march";
            }
            else if (colindex == 11){
                title = "Enter New Quantity for Month of April";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "april";
            }
            else if (colindex == 12){
                title = "Enter New Quantity for Month of May";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "may";
            }
            else if (colindex == 13){
                title = "Enter New Quantity for Month of June";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "june";
            }
            else if (colindex == 14){
                title = "Enter New Quantity for Month of July";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "july";
            }
            else if (colindex == 15){
                title = "Enter New Quantity for Month of August";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "august";
            }
            else if (colindex == 16){
                title = "Enter New Quantity for Month of September";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "september";
            }
            else if (colindex == 17){
                title = "Enter New Quantity for Month of October";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "october";
            }
            else if (colindex == 18){
                title = "Enter New Quantity for Month of November";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "november";
            }
            else if (colindex == 19){
                title = "Enter New Quantity for Month of December";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "december";
            }

            $.confirm({
                escapeKey: "cancel",
                title: title,
                content: content,
                buttons: {
                    save: function () {
                        var strValue = $('#txt-field').val();

                        if(jQuery.inArray(colindex, [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]) !== -1){
                            var orig_qty = td.closest('tr').find('td:eq(' + colindex + ')').attr('data-qty');
                            td.closest('tr').find('td:eq(' + colindex + ')').attr({'data-qty': strValue});
                            
                            var mainqty = td.closest('tr').find('td:eq(4)').text();
                            var totalqty = 0;
                            var jan = td.closest('tr').find('td:eq(8)').attr('data-qty') ? td.closest('tr').find('td:eq(8)').attr('data-qty') : 0,
                                feb = td.closest('tr').find('td:eq(9)').attr('data-qty') ? td.closest('tr').find('td:eq(9)').attr('data-qty') : 0,
                                mar = td.closest('tr').find('td:eq(10)').attr('data-qty') ? td.closest('tr').find('td:eq(10)').attr('data-qty') : 0,
                                apr = td.closest('tr').find('td:eq(11)').attr('data-qty') ? td.closest('tr').find('td:eq(11)').attr('data-qty') : 0,
                                may = td.closest('tr').find('td:eq(12)').attr('data-qty') ? td.closest('tr').find('td:eq(12)').attr('data-qty') : 0,
                                jun = td.closest('tr').find('td:eq(13)').attr('data-qty') ? td.closest('tr').find('td:eq(13)').attr('data-qty') : 0,
                                jul = td.closest('tr').find('td:eq(14)').attr('data-qty') ? td.closest('tr').find('td:eq(14)').attr('data-qty') : 0,
                                aug = td.closest('tr').find('td:eq(15)').attr('data-qty') ? td.closest('tr').find('td:eq(15)').attr('data-qty') : 0,
                                sep = td.closest('tr').find('td:eq(16)').attr('data-qty') ? td.closest('tr').find('td:eq(16)').attr('data-qty') : 0,
                                oct = td.closest('tr').find('td:eq(17)').attr('data-qty') ? td.closest('tr').find('td:eq(17)').attr('data-qty') : 0,
                                nov = td.closest('tr').find('td:eq(18)').attr('data-qty') ? td.closest('tr').find('td:eq(18)').attr('data-qty') : 0,
                                dec = td.closest('tr').find('td:eq(19)').attr('data-qty') ? td.closest('tr').find('td:eq(19)').attr('data-qty') : 0;

                            var per_month_total = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) + parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
                            
                            if (parseInt(per_month_total) != parseInt(mainqty)){
                                td.closest('tr').find('td:eq(' + colindex + ')').attr({'data-qty': orig_qty});
                                message('Error', 'red',"Quantity allocated per month is not equal with the total quantity!");
                            }
                            else{
                                $.ajax({
                                    headers: {
                                        'x-csrf-token': token
                                    },
                                    url: '/ppmp/update/' + attribute,
                                    method: 'POST',
                                    data: {'id': id, 'attr': attribute, 'value': $('#txt-field').val()},
                                    dataType: 'HTML',
                                    success: function(result) {
                                        var dept = $('#departments').val(),
                                            year = $('#cbo_year').val();

                                            retrieveProcurementItems(dept, year);
                                    },
                                    error: function(obj, msg, exception){
                                        message('Error', 'red', msg + ": " + obj.status + " " + exception);
                                    }
                                })
                            }
                        }
                        else{
                            $.ajax({
                                headers: {
                                    'x-csrf-token': token
                                },
                                url: '/ppmp/update/' + attribute,
                                method: 'POST',
                                data: {'id': id, 'attr': attribute, 'value': $('#txt-field').val()},
                                dataType: 'HTML',
                                success: function(result) {
                                    if (colindex == 4 || colindex == 5){
                                        td.closest('tr').find('td:eq(' + colindex + ')').text(strValue);
                                        td.closest('tr').find('td:eq(6)').text(result);
                                    }
                                    else if (colindex == 7){
                                        td.closest('tr').find('td:eq(7)').text(strValue);
                                    }
                                    
                                },
                                error: function(obj, msg, exception){
                                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                                }
                            })
                        }
                    },
                    cancel: function () {
                        
                    }
                }
            });
        }
    });

    function changeMonth(id, month){
        var status = $(event.target).is(":checked");

        $.ajax({
            headers: {
                'x-csrf-token': token
            },
            url: '/ppmp/toggleprocurementitemmonth',
            method: 'POST',
            data: {'deptid': $('#departments').val(), 'id': id, 'month': month, 'status': status},
            dataType: 'HTML',
            beforeSend: function() {
                $('#basicloader').show();
            },
            complete: function(){
                $('#basicloader').hide();
            },
            success: function(result) {
                
            },
            error: function(obj, msg, exception){
                message('Error', 'red', msg + ": " + obj.status + " " + exception);
            }
        })
    }

    function deletePPMPItem(id){
        $.confirm({
            title: "Remove PPMP Item",
            type: "blue",
            content: "This is an irreversible action. Are you sure you want to remove this item?",
            buttons: {
                confirm: function () {
                    $.ajax({
                        headers: {
                            'x-csrf-token': token
                        },
                        url: '/ppmp/toggleprocurementitemstatus',
                        method: 'POST',
                        data: {'deptid': $('#departments').val(), 'id': id, 'status': 0},
                        dataType: 'HTML',
                        success: function(result) {
                            if (result == 1){
                                var dept = $('#departments').val(),
                                year = $('#cbo_year').val();

                                retrieveProcurementItems(dept, year);
                            }
                            else if (result == 2){
                                message('Error', 'red', "Cannot delete this item. Procurement plan is already approved!");
                            }
                            else if (result == 3){
                                message('Error', 'red', "Creating / modification of procurement plan is already closed!");
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
</script>