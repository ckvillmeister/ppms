<style>
  #tbl_item_list{
    font-size: 10pt
  }
</style>
<div class="row m-3">
    <div class="col-sm-12 align-self-center" style="font-size: 10pt">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_item_list">
            <thead>
                <tr>
                    <th class="text-center col-header">No.</th>
                    <th class="text-center col-header">General Description</th>
                    <th class="text-center col-header">Suggested Price</th>
                    <th class="text-center col-header">Control</th>
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($items as $item)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $item->itemname }}</td>
                        <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                        <td class="text-center"><button class="btn btn-xs btn-primary" onclick="getItemInfo({{ $item->id }})" id="addtolist" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Add Item to Procurement List"><i class="fas fa-mouse-pointer mr-2"></i>Select</button></td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  $('#tbl_item_list').DataTable({
    "scrollX": true,
    "ordering": false,
    lengthMenu: [5],
    styles: {
      tableHeader: {
        fontSize: 8
      }
    }
  }).columns.adjust();

  function getItemInfo(id){
    var itemname = $(event.target).closest('tr').find('td:eq(1)').text();
    var price = $(event.target).closest('tr').find('td:eq(2)').text();

    $('#procitemid').val(id);
    $('#procitemname').val(itemname);
    $('#procprice').val(price);
    $('#procqty').val('');
    $('#procqty').focus();
  }
</script>