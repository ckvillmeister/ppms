<tr>
    <td colspan="21" class="bg-dark"></td>
</tr>
<tr>
    <td class="text-center text-xs" colspan="3">Item Description</td>
    <td class="text-center text-xs" colspan="2">Unit</td>
    <!-- <td class="text-center text-xs">Qty</td> -->
    <td class="text-center text-xs" colspan="2">Price</td>
    <!-- <td class="text-center text-xs">Estimated Budget</td> -->
    <td class="text-center text-xs">Procurement Mode</td>
    @foreach ($months as $key => $month)
    <td class="text-center text-xs">{{ $key }}</td>
    @endforeach
    <td class="text-center text-xs">Control</td>
</tr>
<tr>
    <td colspan="3">
        <input list="items" name="item" id="item" class="form form-control form-control-sm">
        <datalist id="items">
            @if ($items)
                @foreach($items as $item)
                    <option value="{{ $item->itemname }}">
                @endforeach
            @endif
        </datalist>
    </td>
    <td colspan="2">
        <input list="units" name="unit" id="unit" class="form form-control form-control-sm">
        <datalist id="units">
            @if ($units)
                @foreach($units as $unit)
                    <option value="{{ $unit->description }}">
                @endforeach
            @endif
        </datalist>
    </td>
    <!-- <td><input type="text" class="form form-control form-control-sm text-center" id="qty" name="qty" onchange="compute()"></td> -->
    <td colspan="2"><input type="text" class="form form-control form-control-sm" id="price" name="price" onchange="compute()"></td>
    <!-- <td><input type="text" class="form form-control form-control-sm" id="total" name="total" readonly="readonly"></td> -->
    <td>
        <!-- <input list="modes" name="mode" id="mode" class="form form-control form-control-sm">
        <datalist id="modes">
            @if ($modes)
                @foreach($modes as $mode)
                    <option value="{{ $mode }}">
                @endforeach
            @endif
        </datalist> -->
        <select name="mode" id="mode" class="form form-control form-control-sm">
            @if ($modes)
                @foreach($modes as $mode)
                    <option value="{{ $mode }}">{{ $mode }}</option>
                @endforeach
            @endif
        </select>
    </td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="January" name="January"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="February" name="February"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="March" name="March"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="April" name="April"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="May" name="May"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="June" name="June"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="July" name="July"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="August" name="August"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="September" name="September"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="October" name="October"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="November" name="November"></td>
    <td><input type="text" class="form form-control form-control-sm text-center text-xs months" id="December" name="December"></td>
    <td class="text-center">
        <button class="btn btn-sm btn-primary" id="btn-save-procurement" onclick="addProcurement({{$objectid}})"><i class="fas fa-save"></i></button>
        <button class="btn btn-sm btn-danger" id="btn-delete-procurement-row" onclick="deleteProcurementRow()"><i class="fas fa-trash"></i></button>
    </td>
</tr>
<script>
    function deleteProcurementRow(){
        var row = $(event.target).closest("tr");
        row.prev().prev().remove();
        row.prev().remove();
        row.remove();
    }
</script>