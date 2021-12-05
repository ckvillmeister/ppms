<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">Role</th>
                    <th class="text-center col-header" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $role->role }}</td>
                        <td class="text-center">
                          <a class="btn btn-sm btn-secondary" id="permissions" href="/roles/managepermissions?id={{ $role->id }}" data-toggle="tooltip" data-placement="top" title="Manage Permissions"><i class="fas fa-list"></i></a>
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $role->id }}" data-toggle="tooltip" data-placement="top" title="Edit Role"><i class="fas fa-edit"></i></button>
                          @if ($role->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $role->id }}" data-toggle="tooltip" data-placement="top" title="Delete Role"><i class="fas fa-trash"></i></button>
                          @elseif ($role->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $role->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Role"><i class="fas fa-check"></i></button>
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