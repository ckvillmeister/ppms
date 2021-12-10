<table class="table table-sm table-striped display bg-white" id="tbl_procurement_list" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center col-header"><pre>Control</pre></th>
            <th class="text-center col-header"><pre>No.</pre></th>
            <th class="text-center col-header"><pre>General Description</pre></th>
            <th class="text-center col-header"><pre>Unit</pre></th>
            <th class="text-center col-header"><pre>Quantity</pre></th>
            <th class="text-center col-header"><pre>Price</pre></th>
            <th class="text-center col-header"><pre>Estimated Budget</pre></th>
            <th class="text-center col-header"><pre>Procurement Mode</pre></th>
            @foreach ($months as $month)
            <th class="text-center col-header" width=""><pre>{{ $month }}</pre></th>
            @endforeach
            <th class="text-center col-header"><pre>Control</pre></th>
        </tr>
    </thead>
    <tbody>
        @if ($items)
            @php ($ctr = 1)
            @foreach ($items as $item)
                <tr data-id="{{ $item->id }}">
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deletePPMPItem({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Delete PPMP Item"><i class="fas fa-trash"></i></button>
                    </td>
                    <td>{{ $ctr++ }}</td>
                    <td style="cursor: pointer; white-space: pre-wrap">{{ $item->itemname }}</td>
                    <td>{{ $item->uom }}</td>
                    <td style="cursor: pointer;">{{ $item->quantity }}</td>
                    <td style="cursor: pointer;">{{ number_format($item->price, 2) }}</td>
                    <td style="white-space: pre-wrap">{{ number_format(($item->price * $item->quantity), 2) }}</td>
                    <td style="cursor: pointer; white-space: nowrap">{{ $item->mode }}</td>
                    @foreach ($months as $month)
                    <td>
                        @if (strtolower($month) == 'january')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->january) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'february')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->february) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'march')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->march) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'april')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->april) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'may')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->may) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'june')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->june) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'july')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->july) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'august')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->august) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'september')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->september) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'october')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->october) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'november')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->november) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'december')
                            <input type="checkbox" class="mr-3" id="{{ $month }}" name="{{ $month }}" value="{{ $month }}" onchange="changeMonth({{ $item->id }}, {{ '"'.$month.'"' }})" {{ ($item->december) ? 'checked="checked"' : ''}}>
                        @endif
                        
                    </td>
                    @endforeach
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deletePPMPItem({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Delete PPMP Item"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

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

    $('#tbl_procurement_list tbody td').dblclick(function() {
        var td = $(this),
            colindex = $(this).index(),
            rowindex = $(this).closest('tr').index(),
            id = $(this).closest('tr').attr('data-id'),
            attribute = '',
            title = '',
            content = '';
        
        if (colindex == 2){
            selected_col_index = colindex;
            selected_row_index = rowindex;
            selected_id = id;

            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/itemlistforupdate',
                method: 'POST',
                data: {'status': 1},
                dataType: 'HTML',
                success: function(result) {
                    $('#listitems').html(result);
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })

            $('#modal_item_list').modal({
                backdrop: 'static',
                keyboard: true, 
                show: true
            });
        }
        else if (colindex == 4 || colindex == 5 || colindex == 7){
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

            $.confirm({
                escapeKey: "cancel",
                title: title,
                content: content,
                buttons: {
                    save: function () {
                        $.ajax({
                            headers: {
                                'x-csrf-token': token
                            },
                            url: '/ppmp/update/' + attribute,
                            method: 'POST',
                            data: {'id': id, 'attr': attribute, 'value': $('#txt-field').val()},
                            dataType: 'HTML',
                            success: function(result) {
                                td.closest('tr').find('td:eq('+colindex+')').text($('#txt-field').val());
                                td.closest('tr').find('td:eq(6)').text(result);
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