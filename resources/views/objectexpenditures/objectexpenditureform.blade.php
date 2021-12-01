<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($objectexpenditureinfo[0])) ? $objectexpenditureinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Class of Expenditure:
        </div>
        <div class="col-lg-9">
            <select class="form-control form-control-sm" id="class_exp" name="class_exp">
                <option value=""></option>
                @foreach ($class_exp as $class)
                    <option value="{{ $class->id }}" {{ (isset($objectexpenditureinfo[0])) ? (($objectexpenditureinfo[0]->class_exp_id == $class->id) ? 'selected="selected"' : '') : '' }}>{{ $class->class_exp_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Object of Expenditure:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Object of Expenditure" id="obj_exp_name" name="obj_exp_name" value="{{ (isset($objectexpenditureinfo[0])) ? $objectexpenditureinfo[0]->obj_exp_name : '' }}">
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