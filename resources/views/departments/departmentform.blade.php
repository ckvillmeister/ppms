<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Office Name:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Office Name" id="office_name" name="office_name" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->office_name : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Description:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Description" id="description" name="description" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->description : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Department Head:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Department Head" id="office_head" name="office_head" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->office_head : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Sub Office / Division:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Sub Office / Division" id="sub_office" name="sub_office" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->sub_office : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Office-in-Charge:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Office-in-Charge" id="sub_office_in_charge" name="sub_office_in_charge" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->sub_office_in_charge : '' }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Position:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Position" id="position" name="position" value="{{ (isset($deptinfo[0])) ? $deptinfo[0]->position : '' }}">
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