<input type="hidden" id="id" name="id" value="{{ (isset($iteminfo)) ? $iteminfo->id : '' }}"> 

<div class="row mt-3">
    <div class="col-lg-4">
        <label class="text-xs">Item General Description:</label>
        <input type="text" class="form-control form-control-sm" placeholder="Ex. (Bond Paper, Ballpen, etc.)" id="itemname" name="itemname" style="padding-left: 20px" value="{{ (isset($iteminfo)) ? $iteminfo->itemname : '' }}" required>
    </div>
    <div class="col-lg-4">
        <label class="text-xs">Class of Expenditure:</label>
        <select class="form-control form-control-sm" style="width: 100%;" id="classexp" name="classexp">
            <option value=""></option>
            @foreach ($classexpenditures as $key => $classexpenditure)
            <option value="{{ $classexpenditure->id }}" {{ ($classinfo) ? (($classinfo->id == $classexpenditure->id) ? 'selected="selected' : '') : '' }}>{{ $classexpenditure->class_exp_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label class="text-xs">Object of Expenditure:</label>
        <select class="form-control form-control-sm" style="width: 100%;" id="objexp" name="objexp">
            <option value=""></option>
            @if ($objects)
                @foreach($objects as $object)
                <option value="{{ $object->id }}" {{ (isset($iteminfo)) ? (($iteminfo->object_of_expenditure == $object->id) ? 'selected="selected"' : '') : '' }}>{{ $object->obj_exp_name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4">
        @php ($year = date('Y'))
        <label class="text-xs">Unit Price:</label>
        <input type="text" class="form-control form-control-sm" id="itemprice" name="itemprice" style="text-align: right" value="{{ (isset($iteminfo)) ? $iteminfo->price : '' }}" >
    </div>
    <div class="col-lg-4">
        <label class="text-xs">Unit of Measurement:</label>
        <select class="form-control form-control-sm" style="width: 100%;" id="uom" name="uom">
            <option value=""></option>
            @foreach ($uom as $key => $unit)
            <option value="{{ $unit->id }}" {{ (!(isset($iteminfo))) ? '' : (($iteminfo->uom == $unit->id) ? 'selected=:"selected"' : '') }}>{{ $unit->uom.' ('.$unit->description.')' }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label class="text-xs">Category:</label>
        <select class="form-control form-control-sm" style="width: 100%;" id="category" name="category">
            <option value=""></option>
            @foreach ($categories as $key => $category)
            <option value="{{ $category->id }}" {{ (!(isset($iteminfo))) ? '' : (($iteminfo->category == $category->id) ? 'selected=:"selected"' : '') }}>{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
</div>
<script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>

  var tkn = $('meta[name="csrf-token"]').attr('content');
  $('#itemprice').inputmask('decimal', {'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'});

  $('#uom').select2({
    dropdownParent: $("#modal_new"),
    dropdownCssClass: "font"
  });
  $('#classexp').select2({
    dropdownParent: $("#modal_new"),
    dropdownCssClass: "font"
  });
  $('#objexp').select2({
    dropdownParent: $("#modal_new"),
    dropdownCssClass: "font"
  });
  $('#category').select2({
    dropdownParent: $("#modal_new"),
    dropdownCssClass: "font"
  });

  $('#classexp').on('change', function(){
    var classid = $(this).val();

    $.ajax({
      headers: {
          'x-csrf-token': tkn
      },
      url: '/object/retrievobjectsbyclass',
      method: 'POST',
      data: {'classid': classid},
      dataType: 'JSON',
      success: function(result) {
        $('#objexp').empty();
        $('#objexp').append('<option value=""></option>');

        $.each(result, function( index, value ) {
            $('#objexp').append('<option value="' + value.id + '">' + value.obj_exp_name + '</option>');
        })

        $('#objexp').select2({
          dropdownParent: $("#modal_new"),
          dropdownCssClass: "font"
        });
      },
      error: function(obj, msg, exception){
          message('Error', 'red', msg + ": " + obj.status + " " + exception);
      }
    })
  });
</script>
