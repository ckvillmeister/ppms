<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_item_list">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Item General Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Unit of Measurement</th>
                    <th class="text-center">Object of Expenditure</th>
                    <th class="text-center">Category</th>
                    <th class="text-center" style="width:120px">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($items as $item)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $item->itemname }}</td>
                        <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                        <td class="text-center">{{ $item->description }}</td>
                        <td>{{ $item->obj_exp_name }}</td>
                        <td>{{ $item->category }}</td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-warning" id="edititem" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fas fa-edit"></i></button>
                          @if ($item->status == 1)
                          <button class="btn btn-sm btn-danger" id="deleteitem" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fas fa-trash"></i></button>
                          @elseif ($item->status == 0)
                          <button class="btn btn-sm btn-success" id="reactivateitem" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Re-activate Item"><i class="fas fa-check"></i></button>
                          @endif
                        </td>
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