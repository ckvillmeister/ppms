<html>

<head>
@include('components.header')
<style>
  #tbl_procurement_list{
    font-size: 10pt
  }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')

    <div class="content-wrapper">
      
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>My Procurement</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">My Procurement</li>
                </ol>
                </div>
            </div>
            </div>
        </section>
        
        <div class="row m-3">
            <div class="col-lg-1">Navigate to:</div>
            <div class="col-lg-2">
                <select id="cbo_year" class="form-control form-control-sm mr-2 mb-2">
                    @for ($i = (date('Y') - 5); $i < (date('Y') + 5); $i++)
                        <option value="{{ $i }}" {{ (date("Y") == $i) ? "selected" : ""; }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row m-3">
            <div class="col-sm-4">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">
                        <h3 class="card-title">Item List</h3>
                        <div class="card-tools mt-2">
                            <button type="button" class="btn btn-tool" id="btn_create_new_item"><i class="fas fa-plus mr-2"> Create New Item</i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                      <div id="item_list"></div>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                      <div class="row m-3">
                        <div class="col-sm-12 align-self-center">
                            <table class="table table-sm table-bordered table-striped display bg-white" style="width: 100%" id="tbl_procurement_list">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">General Description</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Estimated Budget</th>
                                        <th class="text-center">Procurement Mode</th>
                                        @foreach ($months as $month)
                                        <th class="text-center" width="100px">{{ $month }}</th>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        <div class="row mt-3">
          <div class="col-lg-2 align-self-center">
              Item Name:
          </div>
          <div class="col-lg-3">
              <input type="text" class="form-control form-control-sm" placeholder="Ex. Bondpaper" id="txt_itemname">
          </div>
          <div class="col-lg-2 align-self-center">
              Item Description:
          </div>
          <div class="col-lg-5">
              <input type="text" class="form-control form-control-sm" placeholder="Ex. Bondpaper (Long)" id="txt_itemdesc">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-2 align-self-center">
              Price:
          </div>
          <div class="col-lg-3">
            <input type="text" class="form-control form-control-sm" placeholder="Ex. Bondpaper" id="txt_price">
          </div>
          <div class="col-lg-2 align-self-center">
              Unit of Measurement:
          </div>
          <div class="col-md-3">
              <select class="form-control form-control-sm" multiple="multiple" style="width: 100%;" id="cbo_uom">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-2 align-self-center">
              Mode:
          </div>
          <div class="col-lg-3">
              <select class="form-control form-control-sm select2" multiple="" style="width: 100%;" data-dropdown-css-class="select2-primary" id="cbo_mode">
              @foreach ($modes as $mode)
                <option value="{{ $mode }}">{{ $mode }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-2 align-self-center">
              Category:
          </div>
          <div class="col-lg-3">
              <select class="form-control form-control-sm" multiple="multiple" style="width: 100%;" id="cbo_category">
                
              </select>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-8">
            <span id="message"></span>
          </div>
          <div class="col-lg-4">
            <div class="float-right">
              <button class="btn btn-sm btn-primary" id="btn_save"><icon class="fas fa-thumbs-up mr-2"></icon>Save</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/procurement.js') }}"></script>
<script type="text/javascript">
  
  $('#cbo_uom').select2();
  $('#cbo_mode').select2();
  $('#cbo_category').select2();

  var table = $('#tbl_procurement_list').DataTable({
    "scrollX": true,
    "ordering": false,
    lengthMenu: [[25, 50, 100, 200, -1], [25, 50, 100, 200, "All"]],
    styles: {
      tableHeader: {
        fontSize: 8
      }
    }
  });

</script>
