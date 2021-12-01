<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($classexpenditureinfo[0])) ? $classexpenditureinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Class of Expenditure:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Object of Expenditure" id="class_exp_name" name="class_exp_name" value="{{ (isset($classexpenditureinfo[0])) ? $classexpenditureinfo[0]->class_exp_name : '' }}">
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