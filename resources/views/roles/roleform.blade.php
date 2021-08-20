<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($roleinfo[0])) ? $roleinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Role Name:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Role Name" id="role" name="role" value="{{ (isset($roleinfo[0])) ? $roleinfo[0]->role : '' }}">
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