<style>
  #tbl_item_list{
    font-size: 10pt
  }
</style>
<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_item_list">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">General Description</th>
                    <th class="text-center">UOM</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($items as $item)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $item->itemname }}</td>
                        <td>{{ $item->uom }}</td>
                        <td>{{ $item->price }}</td>
                        <td class="text-center"><button class="btn btn-sm btn-primary" id="addtolist" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Add Item to Procurement List"><i class="fas fa-long-arrow-alt-right"></i></button></td>
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