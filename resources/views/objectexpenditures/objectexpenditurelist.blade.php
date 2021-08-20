<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">Object of Expenditure</th>
                    <th class="text-center col-header" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($objectexpenditures as $objectexpenditure)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="">{{ $objectexpenditure->obj_exp_name }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Edit Object of Expenditure"><i class="fas fa-edit"></i></button>
                          @if ($objectexpenditure->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Delete Object of Expenditure"><i class="fas fa-trash"></i></button>
                          @elseif ($objectexpenditure->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $objectexpenditure->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Object of Expenditure"><i class="fas fa-check"></i></button>
                          @endif
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  var table = $('#tbl_list').DataTable({
    "scrollX": true,
    "ordering": false,
    lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
    styles: {
      tableHeader: {
        fontSize: 8
      }
    }
  });
</script>