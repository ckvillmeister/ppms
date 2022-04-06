<input type="hidden" id="proc_item_id" name="proc_item_id" value="{{ $id }}">

<div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Item Description:</label>
    </div>
    <div class="col-lg-6">
        <input list="items" name="eitem" id="eitem" class="form form-control form-control-sm" value="{{ $info->itemname }}">
        <datalist id="items">
            @if ($items)
                @foreach($items as $item)
                    <option value="{{ $item->itemname }}">
                @endforeach
            @endif
        </datalist>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Unit:</label>
    </div>
    <div class="col-lg-4">
        <input list="units" name="eunit" id="eunit" class="form form-control form-control-sm" value="{{ $info->unit }}">
        <datalist id="units">
            @if ($units)
                @foreach($units as $unit)
                    <option value="{{ $unit->description }}">
                @endforeach
            @endif
        </datalist>
    </div>
</div>

<!-- <div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Quantity:</label>
    </div>
    <div class="col-lg-4">
        <input type="text" class="form form-control form-control-sm" id="eqty" name="eqty" onchange="autocompute()" value="{{ $info->quantity }}">
    </div>
</div> -->

<div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Price:</label>
    </div>
    <div class="col-lg-4">
        <input type="text" class="form form-control form-control-sm" id="eprice" name="eprice" onchange="autocompute()" value="{{ $info->price }}">
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Estimated Budget:</label>
    </div>
    <div class="col-lg-4">
        <input type="text" class="form form-control form-control-sm" id="etotal" name="etotal" readonly="readonly" value="{{ number_format(($info->quantity * $info->price), 2) }}">
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-2">
        <label class="text-xs">Mode of Procurement:</label>
    </div>
    <div class="col-lg-4">
        <select name="emode" id="emode" class="form form-control form-control-sm">
            @if ($modes)
                @foreach($modes as $mode)
                    <option value="{{ $mode }}" {{ ($mode == $info->mode) ? 'selected="selected"' : '' }}>{{ $mode }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4">
        <label class="text-xs">Quantity Distributed Per Month:</label>
    </div>
</div>

<div class="row mt-3">
    @foreach($months as $month)
    <div class="col-lg-2">
        <span class="text-sm">{{ $month }}</span>
        <input type="text" class="form form-control form-control-sm text-center text-xs months" id="e{{ $month }}" name="e{{ $month }}"
            value="{{ (
                $month == 'January' ? ($info->january ? $info->january : '')  : 
                ($month == 'February' ? ($info->february ? $info->february : '') :
                ($month == 'March' ? ($info->march ? $info->march : '') :
                ($month == 'April' ? ($info->april ? $info->april : '') :
                ($month == 'May' ? ($info->may ? $info->may : '') :
                ($month == 'June' ? ($info->june ? $info->june : '') : 
                ($month == 'July' ? ($info->july ? $info->july : '') : 
                ($month == 'August' ? ($info->august ? $info->august : '') : 

                ($month == 'September' ? ($info->september ? $info->september : '') : 
                ($month == 'October' ? ($info->october ? $info->october : '') : 
                ($month == 'November' ? ($info->november ? $info->november : '') : 
                ($month == 'December' ? ($info->december ? $info->december : '') : ''
            )))))))))))) }}"
        >
    </div>
    @endforeach
</div>

<script>
    function autocompute(){
        var qty = $('#eqty').val();
        var price = $('#eprice').val().replace(',', '');

        if (!(qty == '' || qty == 0 || price == '' || price == 0)){
            var total = parseFloat(qty) * parseFloat(price);
            $('#etotal').val(total);
        }
    }
</script>

