<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_item_list">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Guard Name</th>
                    <th class="text-center">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td class="text-center"><button class="btn btn-sm btn-warning" id="editrole" value="{{ $role->id }}" data-toggle="tooltip" data-placement="top" title="Edit Role"><i class="fas fa-edit"></i></button></td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  var table = $('#tbl_item_list').DataTable({
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