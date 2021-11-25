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
      
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Manage Procurement</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                    <li class="breadcrumb-item active">Manage Procurement</li>
                </ol>
                </div>
            </div>
            </div>
        </section>

        <div class="row m-3">
          <div class="col-lg-12 text-center">
            <h4>Procurement Year <br><strong>{{ $settings[1]->setting_description }}</strong></h4>
          </div>
        </div>
        
        <div class="row m-3">
            <div class="col-lg-1">Select Dept.:</div>
            <div class="col-lg-4">
                <select id="departments" class="form-control form-control-sm mr-2 mb-2">
                    <option value="">- Select Office / Department -</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" class="form-control-sm"> {{ ($department->sub_office) ? $department->office_name.' ('.$department->sub_office.')' : $department->office_name.' - '.$department->description; }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-1">
              <button class="btn btn-sm btn-primary" id="go"><i class="fas fa-paper-plane mr-2"></i>GO</button>
            </div>
            <div class="col-lg-6">
              <div class="float-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_copy_procurement"><i class="fas fa-copy mr-2"></i> Copy Procurement</button> 
              </div>
            </div>
        </div>

        <div class="row mr-3 ml-3 mb-3 mt-4">

            <div class="col-sm-4">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list mr-2"></i>Item List</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-secondary" id="btn_create_new_item"><i class="fas fa-plus mr-2"></i>Create New Item
                            </button>
                        </div>
                        <div class="overlay-wrapper" id="itemlist_loading">
                        </div>
                    </div>
                    <div class="card-body">
                      <div id="item_list">
                      </div>
                    </div>
                    <div class="overlay" id="itemlist_table"></div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-8">

                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-list mr-2"></i>Procurement List</h3>
                      <div class="overlay-wrapper" id="proclist_loading"></div>
                    </div>
                    <div class="card-body">
                      <div class="row m-3">
                        <div class="col-sm-12 align-self-center">
                            <table class="table table-sm table-bordered table-striped display bg-white" id="tbl_procurement_list">
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
                      </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    <br><br>
    @include('components.footer')
</div>
</body>
</html>

<div class="modal fade" id="modal_create_new_item" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Create New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frm_create_new_item">
          <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Item General Description:
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control form-control-sm" placeholder="Ex. (Bond Paper, Ballpen, etc.)" id="itemname" name="itemname" style="padding-left: 20px">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-4 align-self-center">
                Unit Price:
            </div>
            <div class="col-lg-4">
              <input type="text" class="form-control form-control-sm" id="itemprice" name="itemprice" style="text-align: right">
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
                <option value="{{ $unit->id }}">{{ $unit->uom.' ('.$unit->description.')' }}</option>
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
                <option value="{{ $objexpenditure->id }}">{{ $objexpenditure->obj_exp_name }}</option>
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
                <option value="{{ $category->id }}">{{ $category->category }}</option>
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
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_add_to_list" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Add Item to List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-lg-12">
                Enter quantity for item: <strong id="displayname"></strong>
            </div>
          </div>
        
          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                Quantity:
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control form-control-sm" placeholder="Quantity" id="qty" name="qty" style="padding-left: 20px">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                Mode:
            </div>
            <div class="col-lg-4">
              <select class="form-control form-control-sm" style="width: 100%;" id="mode" name="mode">
              <option value=""></option>
              @foreach ($modes as $key => $mode)
                <option value="{{ $mode }}">{{ $mode }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                  Months:
              </div>
          </div>

          <div class="row mt-3" id="MonthsList">
            @foreach ($months as $month)
            <div class="col-lg-3 p-2">
                <input type="checkbox" class="mr-3" id="{{ 'chk'.$month }}" name="{{ $month }}" value="{{ $month }}" {{ ($month == 'January' | $month == 'July') ? "checked='checked'" : ""; }}><label>{{ $month }}</label>
            </div>
            @endforeach
          </div>

          <div class="row mt-3">
            <div class="col-lg-8">
              <span id="message"></span>
            </div>
            <div class="col-lg-4">
              <div class="float-right">
                <button class="btn btn-sm btn-primary" id="additemtolist"><i class="fas fa-cart-plus mr-2"></i>Add to List</button>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit_procured_item" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Update Item from List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <input type="hidden" id="eid" name="eid">
          <input type="hidden" id="eprice" name="eprice">
          <input type="hidden" id="euom" name="euom">


          <!-- <div class="row">
            <div class="col-lg-12">
              Update Item: <strong id="displayitemname"></strong>
            </div>
          </div><br> -->

          <div class="row">
            <div class="col-lg-3 align-self-center">
                Item General Description:
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control form-control-sm" placeholder="Item General Description" id="eitemname" name="eitemname" disabled>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-sm btn-primary" id="open_item_list">Open Item List</button>
            </div>
          </div>
        
          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                Quantity:
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control form-control-sm" placeholder="Quantity" id="eqty" name="eqty" style="">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                Mode:
            </div>
            <div class="col-lg-4">
              <select class="form-control form-control-sm" style="width: 100%;" id="emode" name="emode" style="padding-left: 20px">
              <option value=""></option>
              @foreach ($modes as $key => $mode)
                <option value="{{ $mode }}">{{ $mode }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-3 align-self-center">
                Months:
            </div>
            <div class="col-lg-9">
              <div class="row" id="EMonthsList">
                  @foreach ($months as $month)
                <div class="col-lg-3 p-2">
                    <input type="checkbox" class="mr-3" id="{{ 'chk'.$month }}" name="{{ $month }}" value="{{ $month }}" {{ ($month == 'January' | $month == 'July') ? "checked='checked'" : ""; }}><label>{{ $month }}</label>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="row mt-3" id="MonthsList">
            
          </div>

          <div class="row mt-3">
            <div class="col-lg-8">
              <span id="message"></span>
            </div>
            <div class="col-lg-4">
              <div class="float-right">
                <button class="btn btn-sm btn-primary" id="updateitemfromlist"><i class="fas fa-cart-plus mr-2"></i>Update Item</button>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_item_list" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Item List</h5>

        <div class="overlay-wrapper" id="eitemlist_loading"></div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="eitem_list">
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

<script src="{{ asset('js/manageprocurement.js') }}"></script>
<script type="text/javascript">
  var tkn = $('meta[name="csrf-token"]').attr('content');
  
  $('#uom').select2({dropdownParent: $("#modal_create_new_item")});
  $('#objexp').select2({dropdownParent: $("#modal_create_new_item")});
  $('#category').select2({dropdownParent: $("#modal_create_new_item")});

  $('#mode').select2({dropdownParent: $("#modal_add_to_list")});
  $('#departments').select2({dropdownCssClass: "font"});

  $('#btn-replicate').on('click', function(){
    var dept = $('#departments').val();

    if (dept == ""){
      message('Empty', 'red', 'Please select a department first!');
    }
    else{
      $.ajax({
        headers: {
            'x-csrf-token': tkn
        },
        url: '/procurement.replicateprocurement',
        method: 'POST',
        data: {'year': $('#cbo_year_copy').val(), 'deptid': dept},
        dataType: 'HTML',
        success: function(result) {
          if (result == 1){
            message('Success', 'green', 'Procurement from year ' + $('#cbo_year_copy').val() + ' successfully replicated!');
            $('#modal_copy_procurement').modal('hide');
            retrieveProcurementList(dept);
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
</script>
