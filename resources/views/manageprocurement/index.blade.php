<html>

<head>
@include('components.header')
<style>
  #tbl_procurement_list{
    font-size: 10pt
  }

  .numerical-cols {
    text-align: right
  }

  .font, .col-header {
    font-size: 10pt
  }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('images/TrinidadLogo.png') }}" alt="DBMLogo" height="500" width="480">
    </div>

    <div class="content-wrapper">

      <div class="overlay-wrapper" id="page_loading"></div>
      
        <section class="content-header mb-2">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                <h1>Project Procurement Management Plan</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                    <li class="breadcrumb-item active">PPMP</li>
                </ol>
                </div>
            </div>
            </div>
        </section>

        <!-- <div class="row m-3">
          <div class="col-lg-12 text-center">
            <h4>Procurement Year <br><strong>{{ $settings[1]->setting_description }}</strong></h4>
          </div>
        </div> -->
        
        <div class="card card-outline direct-chat direct-chat-primary shadow-none">
          <div class="card-body">
            <div class="row m-3">
              <div class="col-lg-3">
                <select id="departments" class="form-control form-control-sm mr-2 mb-2" style="width:100%">
                    <option value="">- Select Office / Department -</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" class="form-control-sm"> {{ ($department->sub_office) ? $department->office_name.' - '.$department->sub_office : $department->office_name; }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-lg-3">
                <select id="cbo_year" class="form-control form-control-sm mr-2 mb-2" style="width:100%">
                    @for ($i = ((date('Y') + 1) - 5); $i < ((date('Y') + 1) + 5); $i++)
                        <option value="{{ $i }}" {{ ($settings[1]->setting_description == $i) ? "selected" : ""; }}>{{ $i }}</option>
                    @endfor
                </select>
              </div>
              <div class="col-lg-6">
                <div class="float-right">
                  <button type="button" class="btn btn-sm btn-success" id="btn_add_procurement_item"><i class="fas fa-plus mr-2"></i>Add Procurement</button>
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_copy_procurement"><i class="fas fa-copy mr-2"></i> Copy Procurement</button> 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3 mt-4">

            <div class="col-sm-12">

                <div class="card card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-body">
                      <div class="row m-3">
                        <div class="col-sm-12 align-self-center">
                            <table class="table table-sm table-striped display bg-white" id="tbl_procurement_list" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center col-header" style="width:100px">Control</th>
                                        <th class="text-center col-header">No.</th>
                                        <th class="text-center col-header" style="width: 150px">General Description</th>
                                        <th class="text-center col-header">Unit</th>
                                        <th class="text-center col-header">Quantity</th>
                                        <th class="text-center col-header">Price</th>
                                        <th class="text-center col-header">Estimated Budget</th>
                                        <th class="text-center col-header">Procurement Mode</th>
                                        @foreach ($months as $month)
                                        <th class="text-center col-header" width="">{{ $month }}</th>
                                        @endforeach
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" id="save_procurement" {{ ($settings[2]->setting_description) ? '' : ((in_array(Auth::user()->role, [1, 2])) ? '' : 'disabled') }}>
                          <i class="fas fa-cart-arrow-down mr-2"></i>Save Procurement
                        </button>
                        <button type="button" class="btn btn-sm btn-success" id="approve_procurement" {{ ($settings[2]->setting_description) ? '' : ((in_array(Auth::user()->role, [1, 2])) ? '' : 'disabled') }}>
                          <i class="fas fa-thumbs-up mr-2"></i>Approve Procurement
                        </button>
                      </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    @include('components.footer')
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
</div>

<div class="modal fade" id="modal_create_new_item" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog" role="document">
    <form class="modal-content" id="frm_create_new_item">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Create Item</h5>
      </div>
      <div class="modal-body">
          <div class="row mt-3">
            <div class="col-lg-4">
              <label class="text-xs">Item General Description:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Ex. (Bond Paper, Ballpen, etc.)" id="itemname" name="itemname" style="padding-left: 20px" required>
            </div>
            <div class="col-lg-4">
              <label class="text-xs">Class of Expenditure:</label>
              <select class="form-control form-control-sm" style="width: 100%;" id="classexp" name="classexp" required>
                <option value=""></option>
                @foreach ($classexpenditures as $key => $classexpenditure)
                <option value="{{ $classexpenditure->id }}">{{ $classexpenditure->class_exp_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4">
              <label class="text-xs">Object of Expenditure:</label>
              <select class="form-control form-control-sm" style="width: 100%;" id="objexp" name="objexp" required>
                <option value=""></option>
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-4">
              <label class="text-xs">Unit Price:</label>
              <input type="text" class="form-control form-control-sm" id="itemprice" name="itemprice" style="text-align: right" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" required>
            </div>
            <div class="col-lg-4">
              <label class="text-xs">Unit Price:</label>
              <select class="form-control form-control-sm" style="width: 100%;" id="uom" name="uom" required>
                <option value=""></option>
                @foreach ($uom as $key => $unit)
                <option value="{{ $unit->id }}">{{ $unit->uom.' ('.$unit->description.')' }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4">
              <label class="text-xs">Category:</label>
              <select class="form-control form-control-sm" style="width: 100%;" id="category" name="category" required>
                <option value=""></option>
                @foreach ($categories as $key => $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="float-right">
          <button type="submit" class="btn btn-sm btn-primary" id="btn-save-item"><i class="fas fa-save mr-2"></i>Save</button>
          <button type="button" class="btn btn-sm btn-secondary" id="btn-back"><i class="fas fa-backward mr-2"></i>Back</button>
          <button type="button" class="btn btn-sm btn-danger" id="btn-close-item" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modal_add_procurement" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Add Procurement</h5>
        <div class="float-right">
          <button type="button" class="btn btn-sm btn-primary" id="btn_create_new_item"><i class="fas fa-plus mr-2"></i>Create New Item</button>
        </div>
      </div>
      <div class="modal-body">

        <div id="itemlist"></div>
      
        <div class="row m-3">
          <div class="col-lg-6">
            <label class="text-xs">Item General Description:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Item General Description" id="" name="" style="padding-left: 20px; background-color: white" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" readonly="readonly">
          </div>
          <div class="col-lg-2">
            <label class="text-xs">Price:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Price" id="price" name="price" style="padding-left: 20px" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" required>
          </div>
          <div class="col-lg-2">
            <label class="text-xs">Quantity:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Quantity" id="qty" name="qty" style="padding-left: 20px" required>
          </div>
          <div class="col-lg-2">
            <label class="text-xs">Mode:</label>
            <select class="form-control form-control-sm" style="width: 100%;" id="mode" name="mode" required>
            <option value=""></option>
              @foreach ($modes as $key => $mode)
              <option value="{{ $mode }}">{{ $mode }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row m-3" id="MonthsList">
          <div class="col-lg-12 p-2 border text-center">
            <label class="text-xs">Select Months</label>
          </div>
          @foreach ($months as $month)
          <div class="col-lg-2 p-2 border">
              <input type="checkbox" class="mr-3" id="{{ 'chk'.$month }}" name="{{ $month }}" value="{{ $month }}" {{ ($month == 'January' | $month == 'July') ? "checked='checked'" : ""; }}><label class="text-xs">{{ $month }}</label>
          </div>
          @endforeach
        </div>

      </div>
      <div class="modal-footer">
        <div class="float-right">
          <button type="button" class="btn btn-sm btn-primary" id="btn-add-procurement"><i class="fas fa-cart-plus mr-2"></i>Add Procurement</button>
          <button type="button" class="btn btn-sm btn-secondary" id="btn-add-procurement-close"><i class="fas fa-cart-arrow-down mr-2"></i>Add Procurement & Close</button>
          <button type="button" class="btn btn-sm btn-danger" id="btn-close-procurement" data-dismiss="modal" style="width:150px"><i class="fas fa-window-close mr-2"></i>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_copy_procurement" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xs modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Replicate Procurement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row mt-3">
            <div class="col-lg-6 align-self-center">
                Select year to replicate
            </div>
            <div class="col-lg-6">
              <select id="cbo_year_copy" name="year" class="form-control form-control-sm mr-2 mb-2">
                  @for ($i = (date('Y') - 5); $i < (date('Y') + 5); $i++)
                      <option value="{{ $i }}" {{ (($settings[1]->setting_description - 1) == $i) ? "selected" : ""; }}>{{ $i }}</option>
                  @endfor
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-8">
              <span id="message"></span>
            </div>
            <div class="col-lg-4">
              <div class="float-right">
                <button id="btn-replicate" class="btn btn-sm btn-primary"><i class="fas fa-copy mr-2"></i>Copy</button>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

</body>
</html>

<script src="{{ asset('js/manageprocurement.js') }}"></script>
<script type="text/javascript">
  $('#uom').select2({
    dropdownParent: $("#modal_create_new_item"),
    dropdownCssClass: "font",
  });
  $('#classexp').select2({
    dropdownParent: $("#modal_create_new_item"),
    dropdownCssClass: "font"
  });
  $('#objexp').select2({
    dropdownParent: $("#modal_create_new_item"),
    dropdownCssClass: "font"
  });
  $('#category').select2({
    dropdownParent: $("#modal_create_new_item"),
    dropdownCssClass: "font"
  });

  // $('#mode').select2({
  //   dropdownParent: $("#modal_add_procurement"),
  //   dropdownCssClass: "font"
  // });

  $('#departments').select2({dropdownCssClass: "font"});
  $('#cbo_year').select2({dropdownCssClass: "font"});
  $('#itemprice').inputmask();
  $('#price').inputmask();

  $('#departments').on('change', function(){
    // alert($('#departments option:selected').text());
  });

  $('#btn_add_procurement_item').on('click', function(){
    $('#modal_add_procurement').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true
    });
  })

  $('#btn-back').on('click', function(){
    $('#modal_create_new_item').modal('hide');
    $('#modal_add_procurement').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true
    });
  })

  $('#btn_create_new_item').on('click', function(){
    $('#reset').click(); 
    $('#classexp').val([]).trigger('change');
    $('#uom').val([]).trigger('change');
    $('#mode').val([]).trigger('change');
    $('#objexp').val([]).trigger('change');
    $('#category').val([]).trigger('change');
    $('#modal_add_procurement').modal('hide');
    $('#modal_create_new_item').modal({
                                    backdrop: 'static',
                                    keyboard: true, 
                                    show: true});
  });

  $('#modal_add_procurement').on('shown.bs.modal', function(){
    $('#tbl_item_list').DataTable().columns.adjust();
  });

  $('#frm_create_new_item').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      headers: {
          'x-csrf-token': token
      },
      url: '/items.create',
      method: 'POST',
      data: $(this).serialize(),
      dataType: 'HTML',
      success: function(result) {
        if (result == 1){
          message('Saved', 'green', "Item successfully saved!");
          retrieveItems(1);
          $('#modal_create_new_item').modal('hide');
          $('#modal_add_procurement').modal({
              backdrop: 'static',
              keyboard: true, 
              show: true
          });
        }
        else{
          $.confirm({
            boxWidth: '30%',
            useBootstrap: false,
            title: 'Similar Items',
            type: 'blue',
            content: result,
            buttons: {
              confirm: function () {
                $.ajax({
                  headers: {
                      'x-csrf-token': token
                  },
                  url: '/items.create',
                  method: 'POST',
                  data: $("#frm_create_new_item").serialize() + '&confirm=1',
                  dataType: 'HTML',
                  success: function(result) {
                    if (result == 1){
                      message('Saved', 'green', "Item successfully saved!");
                      retrieveItems(1);
                      $('#modal_create_new_item').modal('hide');
                      $('#modal_add_procurement').modal({
                          backdrop: 'static',
                          keyboard: true, 
                          show: true
                      });
                    }
                    else{
                      message('Error', 'red', "Error during processing!");
                    }
                  },
                  error: function(obj, msg, exception){
                      message('Error', 'red', msg + ": " + obj.status + " " + exception);
                  }
                })
              },
              cancel: function () {
                  
              }
            }
          });
        }
      },
      error: function(obj, msg, exception){
          message('Error', 'red', msg + ": " + obj.status + " " + exception);
      }
    })
  });
  

  $('#classexp').on('change', function(){
    var classid = $(this).val();

    $.ajax({
      headers: {
          'x-csrf-token': token
      },
      url: '/object_expenditures.retrievobjectsbyclass',
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
          dropdownParent: $("#modal_create_new_item"),
          dropdownCssClass: "font"
        });
      },
      error: function(obj, msg, exception){
          message('Error', 'red', msg + ": " + obj.status + " " + exception);
      }
    })
  });

  $('#approve_procurement').on('click', function(){
    var dept = $('#departments').val(), year = $('#cbo_year').val(), dept_desc = $( "#departments option:selected" ).text(), status = $(this).val();

    if (dept == ""){
      message('Empty', 'red', 'Please select a department first!');
    }
    else if (year == ""){
      message('Empty', 'red', 'Please select a department first!');
    }
    else{
      $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/procurement.approveprocurement',
        method: 'POST',
        data: {'year': $('#cbo_year').val(), 'deptid': dept, 'status': status},
        dataType: 'HTML',
        success: function(result) {
          if (result == 1){
            message('Info', 'blue', dept_desc + ' procurement approval for year ' + year + ' has been reverted to unapproved status!');
          }
          else if (result == 2){
            message('Success', 'green', dept_desc + ' procurement for year ' + year + ' has been approved!');
          }
          else{
            message('Error', 'red', 'Error during processing!');
          }
          setApprovalStatus(dept, year);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
      })
    }
    
  });

  $('#btn-replicate').on('click', function(){
    var dept = $('#departments').val(), year = $('#cbo_year').val();

    if (dept == ""){
      message('Empty', 'red', 'Please select a department first!');
    }
    else{
      $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/procurement.replicateprocurement',
        method: 'POST',
        data: {'year': $('#cbo_year_copy').val(), 'deptid': dept},
        dataType: 'HTML',
        success: function(result) {
          if (result == 1){
            message('Success', 'green', 'Procurement from year ' + $('#cbo_year_copy').val() + ' successfully replicated!');
            $('#modal_copy_procurement').modal('hide');
            retrieveProcurementList(dept, year);
          }
          else if(result == 2){
            message('<i class="fas fa-info mr-2"></i>Info', 'blue', 'No procurement from year ' + $('#cbo_year_copy').val() + '.');
          }
          else{
            message('Error', 'red', 'Error during processing!');
          }
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
      })
    }
  });

  function retrieveItems(status){
    $.ajax({
      headers: {
          'x-csrf-token': token
      },
      url: '/ppmp/itemlist',
      method: 'POST',
      data: {'status': status},
      setCookies: token,
      dataType: "HTML",
      beforeSend: function() {
          $('#basicloader').show();
      },
      complete: function(){
          $('#basicloader').hide();
      },
      success: function(result) {
          $('#itemlist').html(result);
      },
      error: function(obj, msg, exception){
          message('Error', 'red', msg + ": " + obj.status + " " + exception);
      }
    })
  }

  retrieveItems(1);
</script>
