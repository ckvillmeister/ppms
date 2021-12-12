<div class="row mt-3">
    <div class="col-lg-6">
        <select class="form form-control form-control-sm" id="objects" style="width:100%">
            <option value="" data-amount=''> - Object of Expenditures - </option>
            @foreach ($objects as $object)
                <option value="{{ $object->object}}" data-amount="{{ $object->amount }}">{{ $object->object()->where('id', $object->object)->first()->obj_exp_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6">
        <div class="float-right">
            <input type="text" class="form form-control form-control-sm bg-white text-right" id="text-approved-amount" readonly="readonly">
        </div>
    </div>
</div>
<br>
<script>
    $("#text-approved-amount").inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});

    $('#objects').on('change', function(){
        var amount = $('option:selected', this).attr('data-amount');
        $('#text-approved-amount').val(amount);
    })
</script>

