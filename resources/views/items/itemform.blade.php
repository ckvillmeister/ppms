<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($iteminfo[0])) ? $iteminfo[0]->id : '' }}"> 

        <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Item General Description:
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control form-control-sm" placeholder="Ex. (Bond Paper, Ballpen, etc.)" id="itemname" name="itemname" style="padding-left: 20px" value="{{ (isset($iteminfo[0])) ? $iteminfo[0]->itemname : '' }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Unit Price:
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control form-control-sm" id="itemprice" name="itemprice" style="text-align: right" value="{{ (isset($iteminfo[0])) ? $iteminfo[0]->price : '' }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Unit of Measurement:
            </div>
            <div class="col-lg-4">
                <select class="form-control form-control-sm" style="width: 100%;" id="uom" name="uom">
                <option value=""></option>
                @foreach ($uom as $key => $unit)
                <option value="{{ $unit->id }}" {{ (!(isset($iteminfo[0]))) ? '' : ($iteminfo[0]->uom == $unit->id) ? 'selected=:"selected"' : '' }}>{{ $unit->uom.' ('.$unit->description.')' }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Object of Expenditure:
            </div>
            <div class="col-lg-4">
                <select class="form-control form-control-sm" style="width: 100%;" id="objexp" name="objexp">
                <option value=""></option>
                @foreach ($objexpenditures as $key => $objexpenditure)
                <option value="{{ $objexpenditure->id }}" {{ (!(isset($iteminfo[0]))) ? '' : ($iteminfo[0]->object_of_expenditure == $objexpenditure->id) ? 'selected=:"selected"' : '' }}>{{ $objexpenditure->obj_exp_name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Category:
            </div>
            <div class="col-lg-4">
                <select class="form-control form-control-sm" style="width: 100%;" id="category" name="category">
                    <option value=""></option>
                    @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}" {{ (!(isset($iteminfo[0]))) ? '' : ($iteminfo[0]->category == $category->id) ? 'selected=:"selected"' : '' }}>{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    <div class="row mt-3">
    <div class="col-lg-8">
        <span id="message"></span>
    </div>
    <div class="col-lg-4">
        <div class="float-right">
        <input type="submit" class="btn btn-sm btn-primary" id="save" value="Save">
        <input type="reset" class="btn btn-sm btn-primary" id="reset" value="Reset">
        </div>
    </div>
    </div>

</form>
<script>
  $('#uom').select2({
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
</script>
