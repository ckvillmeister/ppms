<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header" style="width:100px">No.</th>
                    <th class="text-center col-header" style="width:200px">Unit of Measurement</th>
                    <th class="text-center col-header">Description</th>
                    <th class="text-center col-header" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($units as $unit)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="text-center">{{ $unit->uom }}</td>
                        <td class="text-center">{{ $unit->description }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $unit->id }}" data-toggle="tooltip" data-placement="top" title="Edit Unit"><i class="fas fa-edit"></i></button>
                          @if ($unit->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $unit->id }}" data-toggle="tooltip" data-placement="top" title="Delete Unit"><i class="fas fa-trash"></i></button>
                          @elseif ($unit->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $unit->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Unit"><i class="fas fa-check"></i></button>
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