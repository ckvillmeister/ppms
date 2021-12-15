@php
use App\Http\Controllers\AuthenticationController as Authentication; 
@endphp
<table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
    <thead>
        <tr>
            <th class="text-center col-header">No.</th>
            <th class="text-center col-header">AIP  Ref. Code</th>
            <th class="text-center col-header">Class of Expenditure</th>
            <th class="text-center col-header">Object of Expenditure</th>
            <th class="text-center col-header">Approved Amount</th>
            <th style="width:100px" class="text-center col-header">Control</th>
        </tr>
    </thead>
    <tbody>
        @php ($ctr = 1)
        @foreach ($objectexpenditures as $objectexpenditure)
            <tr data-objid="{{ $objectexpenditure->id }}">
                <td class="text-center">{{ $ctr++ }}</td>
                <td class="text-center">{{ $objectexpenditure->aip }}</td>
                <td class="">{{ $objectexpenditure->class_of_expenditure->where('id', $objectexpenditure->class_exp_id)->first()->class_exp_name  }}</td>
                <td class="">{{ $objectexpenditure->obj_exp_name }}</td>
                <td class="text-center" style="cursor: pointer;">
                    @if ($objectexpenditure->amount)
                        <code>{{ number_format($objectexpenditure->amount, 2) }}</code>
                    @else
                        <code class="badge badge-primary">Double click to set amount</code>
                    @endif
                </td>
                <td class="text-center">
                @if (Authentication::isAuthorized(Auth::user()->role, 'objectEdit'))<button class="btn btn-sm btn-warning col-sm-12" id="edit" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Edit Object of Expenditure"><i class="fas fa-edit mr-2"></i>Edit</button><br>@endif
                @if ($objectexpenditure->status == 1)
                @if (Authentication::isAuthorized(Auth::user()->role, 'objectDelete'))<button class="btn btn-sm btn-danger col-sm-12 mt-1" id="delete" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Delete Object of Expenditure"><i class="fas fa-trash mr-2"></i>Delete</button><br>@endif
                @elseif ($objectexpenditure->status == 0)
                <button class="btn btn-sm btn-success col-sm-12 mt-1" id="reactivate" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Object of Expenditure"><i class="fas fa-check mr-2"></i>Activate</button>
                @endif
                </td>
            </tr> 
        @endforeach
    </tbody>
</table>

<script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
    var td, colindex, rowindex, objid;
    var table = $('#tbl_list').DataTable({
        "scrollX": true,
        "ordering": false,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
        iDisplayLength: -1,
        styles: {
            tableHeader: {
                fontSize: 8
            }
        }
    });

    $('#tbl_list tbody td').dblclick(function() {
        td = $(this);
        colindex = $(this).index();
        rowindex = $(this).closest('tr').index();
        objid = $(this).closest('tr').attr('data-objid');

        if (colindex == 4){
            $('#tbl_list tbody tr').each(function(){
                var text = $(this).find('td:eq(4)').text();

                if (text == 'Double click to set amount'){
                    $(this).find('td:eq(4)').html('<code class="badge badge-primary">Double click to set amount</code>');
                }
            });
            
            var amount;

            if (td.text() != 'Double click to set amount'){
                amount = td.text();
            }

            td.html('<input type="text" class="form form-control form-control-sm" id="approved-amount" value=' + amount + '>');
            $("body #approved-amount").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});
            $('#approved-amount').focus();
        }
        else if (colindex == 1){
            $('#tbl_list tbody tr').each(function(){
                var text = $(this).find('td:eq(4)').text();

                if (text == ''){
                    $(this).find('td:eq(4)').html('');
                }
            });

            var code = '';

            if (td.text() != ''){
                code = td.text();
            }
            
            td.html('<input type="text" class="form form-control form-control-sm" id="aip-code"  value="' + code + '">');
            $('#aip-code').focus();
        }
    });

    $('body').on('keypress', '#approved-amount', function(e){
        var amount = $(this).val(),
            deptid = $('#deptid').val();

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == 13){
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/object/setbudget',
                method: 'POST',
                data: {'deptid': deptid, 'objid': objid, 'amount': amount},
                setCookies: token,
                dataType: "HTML",
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    retrieveObjects(1);
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    });

    $('body').on('keypress', '#aip-code', function(e){
        var code = $(this).val();
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == 13){
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/object/setaipcode',
                method: 'POST',
                data: {'objid': objid, 'code': code},
                setCookies: token,
                dataType: "HTML",
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    retrieveObjects(1);
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    });
</script>