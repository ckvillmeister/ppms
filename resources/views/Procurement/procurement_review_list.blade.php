<div class="row m-3">
    <div class="col-sm-12 align-self-center">
        <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list">
            <thead>
                <tr>
                    <th class="text-center" style="width: 20px"><!--input type="checkbox" id="check_all">--></th>
                    <th class="text-center" style="width:50px">Control</th>
                    <th class="text-center">No.</th>
                    <th class="text-center" style="width: 150px">General Description</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Estimated Budget</th>
                    <th class="text-center">Procurement Mode</th>
                    @foreach ($months as $month)
                    <th class="text-center" width="">{{ $month }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php ($ctr = 1)
                @foreach ($items as $item)
                <tr>
                    <td class="text-center"><input type="checkbox" class="" id="item_chkbox" value="{{ $item->id }}"></td>
                    <td class="text-center"><button class="btn btn-sm btn-warning" value="{{ $item->id }}" id="edit_qty" data-toggle="tooltip" data-placement="top" title="Edit Quantity"><i class="fas fa-edit"></i></button></td>
                    <td class="text-center">{{ $ctr++ }}</td>
                    <td class="text-center">{{ $item->itemname }}</td>
                    <td class="text-center">{{ $item->uom }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="numerical-cols">{{ number_format($item->price, 2) }}</td>
                    <td class="numerical-cols">{{ number_format($item->price * $item->quantity, 2) }}</td>
                    <td class="text-center">{{ $item->mode }}</td>
                    <td class="text-center"><input type="checkbox" id="January" {{ ($item->january) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="February" {{ ($item->february) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="March" {{ ($item->march) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="April" {{ ($item->april) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="May" {{ ($item->may) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="June" {{ ($item->june) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="July" {{ ($item->july) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="August" {{ ($item->august) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="September" {{ ($item->september) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="October" {{ ($item->october) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="November" {{ ($item->november) ? 'checked="checked"' : '' }}></td>
                    <td class="text-center"><input type="checkbox" id="December" {{ ($item->december) ? 'checked="checked"' : '' }}></td>

                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

<script>
    var tbl_proc_list = $('#tbl_procurement_list').DataTable({
    "scrollX": true,
    "ordering": false,
    lengthMenu: [[10, 25, 50, 100, 150, 200, -1], [10, 25, 50, 100, 150, 200, "All"]],
    styles: {
      tableHeader: {
        fontSize: 8
      }
    }
  });
</script>