<style>
  #tbl_list{
    font-size: 10pt
  }
</style>
<div class="row">
    <div class="col-sm-12 align-self-center" style="font-size: 10pt">
        <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_list">
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
                        <td class="text-center"><button class="btn btn-xs btn-primary" onclick="replaceItem({{ $item->id }})" id="selectitem" value="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="Add Item to Procurement List"><i class="fas fa-mouse-pointer mr-2"></i>Select</button></td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  setTimeout(function(){ 
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
  }, 100);

  function replaceItem(id){
    var itemid = id,
        itemname = $(event.target).closest('tr').find('td:eq(1)').text(),
        dept = $('#departments').val(),
        year = $('#cbo_year').val();

    $('#modal_item_list').modal('hide');
    
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/ppmp/replaceitem',
        method: 'POST',
        data: {'dept': dept,
                'year': year,
                'ppmpitemid': selected_id, 
                'itemid': itemid, 
                'itemname': itemname},
        dataType: 'HTML',
        success: function(result) {
          retrieveProcurementItems(dept, year);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
    
  }
</script>