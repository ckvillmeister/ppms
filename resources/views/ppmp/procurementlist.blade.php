<table class="table table-sm table-striped display bg-white" id="tbl_procurement_list" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center col-header" style="width:100px"><pre>Control</pre></th>
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
            <th class="text-center col-header" style="width:100px"><pre>Control</pre></th>
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
                    <td style="white-space: pre-wrap">{{ $item->itemname }}</td>
                    <td>{{ $item->uom }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td style="white-space: pre-wrap">{{ number_format(($item->price * $item->quantity), 2) }}</td>
                    <td style="white-space: nowrap">{{ $item->mode }}</td>
                    @foreach ($months as $month)
                    <td>
                        @if (strtolower($month) == 'january')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->january) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'february')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->february) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'march')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->march) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'april')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->april) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'may')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->may) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'june')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->june) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'july')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->july) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'august')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->august) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'september')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->september) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'october')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->october) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'november')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->november) ? 'checked="checked"' : ''}}>
                        @elseif (strtolower($month) == 'december')
                            <input type="checkbox" class="mr-3" id="" name="{{ $month }}" value="{{ $month }}" {{ ($item->december) ? 'checked="checked"' : ''}}>
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
        //$(this).closest('tr').find('td:eq(2)').text();  
        var td = $(this),
            index = $(this).index(),
            id = $(this).closest('tr').attr('data-id'),
            attribute = '',
            title = '',
            content = '';
        
        if (index == 4 || index == 5){
            if (index == 4){
                title = "Enter New Quantity";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                attribute = "quantity";
            }
            else if (index == 5){
                var mask = "'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'";
                title = "Enter New Price";
                content = "<input type='text' class='form form-control' id='txt-field' autofocus>";
                $('#txt-field').inputmask();
                attribute = "price";
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
                            url: '/ppmp.update/' + attribute,
                            method: 'POST',
                            data: {'id': id, 'attr': attribute, 'value': $('#txt-field').val()},
                            dataType: 'HTML',
                            success: function(result) {
                                td.closest('tr').find('td:eq('+index+')').text($('#txt-field').val());
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

    //retrieveProcurementItems();

    function deletePPMPItem(){

    }
</script>