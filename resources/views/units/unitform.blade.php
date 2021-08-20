<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($unitinfo[0])) ? $unitinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Unit of Measurement:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Unit of Measurement" id="uom" name="uom" value="{{ (isset($unitinfo[0])) ? $unitinfo[0]->uom : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Description:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Description" id="description" name="description" value="{{ (isset($unitinfo[0])) ? $unitinfo[0]->description : '' }}">
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