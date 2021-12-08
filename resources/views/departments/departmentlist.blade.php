<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">Deparment / Office</th>
                    <th class="text-center col-header">Description</th>
                    <th class="text-center col-header">Department Head</th>
                    <th class="text-center col-header">Sub Office / Division</th>
                    <th class="text-center col-header">Sub Office <br> Division-in-charge</th>
                    <th class="text-center col-header">Position</th>
                    <th class="text-center col-header" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($departments as $department)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="text-center">{{ $department->office_name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>{{ $department->office_head }}</td>
                        <td>{{ $department->sub_office }}</td>
                        <td>{{ $department->sub_office_in_charge }}</td>
                        <td>{{ $department->position }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Edit Department"><i class="fas fa-edit"></i></button>
                          @if ($department->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Delete Department"><i class="fas fa-trash"></i></button>
                          @elseif ($department->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Department"><i class="fas fa-check"></i></button>
                          @endif
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br><br>
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