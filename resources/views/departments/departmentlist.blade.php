<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_deparment_list">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Deparment / Office</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Sub Office</th>
                    <th class="text-center" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($departments as $department)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="text-center">{{ $department->office_name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>{{ $department->sub_office }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="editdept" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Edit Deparment"><i class="fas fa-edit"></i></button>
                          @if ($department->status == 1)
                          <button class="btn btn-sm btn-danger" id="deletedept" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Delete Deparment"><i class="fas fa-trash"></i></button>
                          @elseif ($department->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivatedept" value="{{ $department->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Deparment"><i class="fas fa-check"></i></button>
                          @endif
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  var table = $('#tbl_deparment_list').DataTable({
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