<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">Fullname</th>
                    <th class="text-center col-header">Username</th>
                    <th class="text-center col-header">Department / Sub-office</th>
                    <th class="text-center col-header">Role</th>
                    <th class="text-center col-header">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($accounts as $account)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="text-center">{{ ($account->extension) ? $account->firstname.' '.$account->lastname : $account->firstname.' '.$account->lastname.' '.$account->extension;}}</td>
                        <td class="text-center">{{ $account->username }}</td>
                        <td class="text-center">{{ ($account->sub_office) ? $account->office_name.' ('.$account->sub_office.')' : $account->description }}</td>
                        <td class="text-center">{{ $account->role }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-secondary" id="changepass" value="{{ $account->id }}" data-toggle="tooltip" data-placement="top" title="Change Password"><i class="fas fa-key"></i></button>
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $account->id }}" data-toggle="tooltip" data-placement="top" title="Edit Account"><i class="fas fa-edit"></i></button>
                          @if ($account->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $account->id }}" data-toggle="tooltip" data-placement="top" title="Delete Account"><i class="fas fa-trash"></i></button>
                          @elseif ($account->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $account->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Account"><i class="fas fa-check"></i></button>
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