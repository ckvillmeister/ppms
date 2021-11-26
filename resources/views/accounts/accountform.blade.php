<form id="frm">

    <input type="hidden" id="id" name="id" value="{{ (isset($accountinfo[0])) ? $accountinfo[0]->id : '' }}"> 

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            First Name:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="First Name" id="firstname" name="firstname" value="{{ (isset($accountinfo[0])) ? $accountinfo[0]->firstname : '' }}" style="padding-left: 20px">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Middle Name:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Middle Name" id="middlename" name="middlename" value="{{ (isset($accountinfo[0])) ? $accountinfo[0]->middlename : '' }}" style="padding-left: 20px">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Last Name:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Last Name" id="lastname" name="lastname" value="{{ (isset($accountinfo[0])) ? $accountinfo[0]->lastname : '' }}" style="padding-left: 20px">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Extension:
        </div>
        <div class="col-lg-9">
            <select class="form-control form-control-sm" style="width: 100%;" id="extension" name="extension">
                <option value="">- Name Extension -</option>
                @foreach ($extensions as $key => $extension)
                <option value="{{ $key }}" {{ (!(isset($accountinfo[0]))) ? '' : (($accountinfo[0]->extension == $key) ? 'selected=:"selected"' : '') }}>{{ $extension }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Username:
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control form-control-sm" placeholder="Username" id="username" name="username" value="{{ (isset($accountinfo[0])) ? $accountinfo[0]->username : '' }}" style="padding-left: 20px">
        </div>
    </div>

    <div class="row mt-3" id="password_field">
        <div class="col-lg-3 align-self-center">
            Password:
        </div>
        <div class="col-lg-9">
            <input type="password" class="form-control form-control-sm" placeholder="Password" id="password" name="password" value="password" style="padding-left: 20px">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Department:
        </div>
        <div class="col-lg-9">
            <select class="form-control form-control-sm" style="width: 100%;" id="department" name="department">
                <option value="">- Select Department -</option>
                @foreach ($departments as $key => $department)
                <option value="{{ $department->id }}" {{ (!(isset($accountinfo[0]))) ? '' : (($accountinfo[0]->department == $department->id) ? 'selected=:"selected"' : '') }}>{{ ($department->sub_office) ? $department->description.' ('.$department->sub_office.')' : $department->description }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3 align-self-center">
            Role:
        </div>
        <div class="col-lg-9">
            <select class="form-control form-control-sm" style="width: 100%;" id="role" name="role">
                <option value="">- Select Role -</option>
                @foreach ($roles as $key => $role)
                <option value="{{ $role->id }}" {{ (!(isset($accountinfo[0]))) ? '' : (($accountinfo[0]->role == $role->id) ? 'selected=:"selected"' : '') }}>{{ $role->role }}</option>
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
    var username = '';

    $('#extension').select2({
        dropdownParent: $("#modal_new"),
        dropdownCssClass: "font"
    });
    $('#department').select2({
        dropdownParent: $("#modal_new"),
        dropdownCssClass: "font"
    });
    $('#role').select2({
        dropdownParent: $("#modal_new"),
        dropdownCssClass: "font"
    });

    $('#firstname').change(function(){
        // if (update == 0){
        // username = $(this).val().trim().split(" ").join("").toLowerCase();
        // }
        // else{
        //     if($('#firstname').val() == ''){
                username = $(this).val().trim().split(" ").join("").toLowerCase();
            // }
        // }
    });

    $('#lastname').change(function(){
        // if (update == 0){
        //     $('#lastname').val(username+'.'+$(this).val().split(" ").join("").toLowerCase());
        // }
        // else{
        //     if($('#lastname').val() == ''){
                $('#username').val(username+'.'+$(this).val().split(" ").join("").toLowerCase());
        //     }
        // }
    });
</script>