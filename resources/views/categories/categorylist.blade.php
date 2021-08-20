<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">Category</th>
                    <th class="text-center col-header" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td class="">{{ $category->category }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="edit" value="{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Edit Category"><i class="fas fa-edit"></i></button>
                          @if ($category->status == 1)
                          <button class="btn btn-sm btn-danger" id="delete" value="{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                          @elseif ($category->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivate" value="{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Category"><i class="fas fa-check"></i></button>
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