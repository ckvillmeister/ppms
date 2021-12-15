
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
    <td>
        <input list="units" name="unit" id="unit" class="form form-control form-control-sm">
        <datalist id="units">
            @if ($units)
                @foreach($units as $unit)
                    <option value="{{ $unit->description }}">
                @endforeach
            @endif
        </datalist>
    </td>
    <td><input type="text" class="form form-control form-control-sm text-center" id="qty" name="qty" onchange="compute()"></td>
    <td><input type="text" class="form form-control form-control-sm" id="price" name="price" onchange="compute()"></td>
    <td><input type="text" class="form form-control form-control-sm" id="total" name="total" readonly="readonly"></td>
    <td>
        <input list="modes" name="mode" id="mode" class="form form-control form-control-sm">
        <datalist id="modes">
            @if ($modes)
                @foreach($modes as $mode)
                    <option value="{{ $mode }}">
                @endforeach
            @endif
        </datalist>
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
        <button class="btn btn-sm btn-primary" id="btn-save-procurement" onclick="addProcurement()"><i class="fas fa-save"></i></button>
    </td>
</tr>

<script>
    $("body .months").inputmask('decimal');
    $("body #qty").inputmask('decimal');
    $("body #price").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});
    $("body #total").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});

    function compute(){
        var qty = $(event.target).closest('tr').find('#qty').val();
        var price = $(event.target).closest('tr').find('#price').val().replace(',', '');

        if (!(qty == '' || qty == 0 || price == '' || price == 0)){
            var total = parseFloat(qty) * parseFloat(price);
            $(event.target).closest('tr').find('#total').val(total);
        }
    }

    function addProcurement(){
        
        var dept = $('#departments').val(),
            year = $('#cbo_year').val(),
            itemname = $(event.target).closest('tr').find('#item').val(),
            unit = $(event.target).closest('tr').find('#unit').val(),
            object = $('#objects').val(),
            qty = $(event.target).closest('tr').find('#qty').val(),
            price = $(event.target).closest('tr').find('#price').val(),
            mode = $(event.target).closest('tr').find('#mode').val(),
            jan = $('#January').val() ? $('#January').val() : 0,
            feb = $('#February').val() ? $('#February').val() : 0,
            mar = $('#March').val() ? $('#March').val() : 0,
            apr = $('#April').val() ? $('#April').val() : 0,
            may = $('#May').val() ? $('#May').val() : 0,
            jun = $('#June').val() ? $('#June').val() : 0,
            jul = $('#July').val() ? $('#July').val() : 0,
            aug = $('#August').val() ? $('#August').val() : 0,
            sep = $('#September').val() ? $('#September').val() : 0,
            oct = $('#October').val() ? $('#October').val() : 0,
            nov = $('#November').val() ? $('#November').val() : 0,
            dec = $('#December').val() ? $('#December').val() : 0;
        var per_month_total = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) + parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) + parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
        
        if (itemname == ''){
            message('Error', 'red',"Please select / provide an item name!");
        }
        else if (unit == ''){
            message('Error', 'red',"Please select / provide unit of measurement!");
        }
        else if (qty == ''){
            message('Error', 'red',"Please enter an item quantity!");
        }
        else if (price == ''){
            message('Error', 'red',"Please enter an item price!");
        }
        else if (mode == ''){
            message('Error', 'red',"Please select mode of procurement!");
        }
        else if (parseInt(per_month_total) > parseInt(qty)){
            message('Error', 'red',"Quantity allocated per month is more than the item quantity entered!");
        }
        else if (parseInt(per_month_total) < parseInt(qty)){
            message('Error', 'red',"Quantity allocated per month is less than the item quantity entered!");
        }
        else{
            $.ajax({
                headers: {
                    'x-csrf-token': token
                },
                url: '/ppmp/create',
                method: 'POST',
                data: {
                    'dept': dept,
                    'year': year,
                    'itemname': itemname,
                    'object': object,
                    'unit': unit,
                    'qty': qty,
                    'price': price,
                    'mode': mode,
                    'January': jan,
                    'February': feb,
                    'March': mar,
                    'April': apr,
                    'May': may,
                    'June': jun,
                    'July': jul,
                    'August': aug,
                    'September': sep,
                    'October': oct,
                    'November': nov,
                    'December': dec
                },
                setCookies: token,
                dataType: "JSON",
                beforeSend: function() {
                    $('#basicloader').show();
                },
                complete: function(){
                    $('#basicloader').hide();
                },
                success: function(result) {
                    if (result.result == 1){
                        retrieveProcurementItems(dept, year);
                    }
                    else{
                        message(result.result, result.color, result.message);
                    }
                },
                error: function(obj, msg, exception){
                    message('Error', 'red', msg + ": " + obj.status + " " + exception);
                }
            })
        }
    }
</script>