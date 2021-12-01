<html>

<head>
@include('components.header')
<style>
  #tbl_list{
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

    <div class="content-wrapper">

      <div class="overlay-wrapper text-center" id="page_loading"></div>
      
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage Items</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">Manage Items</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-primary" id="new"><i class="fas fa-plus mr-4"></i>New</button>
            <button class="btn btn-sm btn-secondary" id="active"><i class="fas fa-check mr-2"></i>Active</button>
            <button class="btn btn-sm btn-danger" id="inactive"><i class="fas fa-trash mr-2"></i>Inactive</button>
            <div class="float-right">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_copy_items"><i class="fas fa-copy mr-2"></i> Copy All Items</button> 
            </div>
        </div>
      </div>

      <div class="row m-3 bg-white">
        <div class="col-sm-12 pt-4">
          <div id="list"></div>
        </div>
      </div>

      <br><br>

    </div>
    @include('components.footer')
</div>
</body>
</html>

<div class="modal fade" id="modal_new" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Item Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="overlay-wrapper" id="form_loading"></div>
      </div>
      <div class="modal-body">
        <div id="form"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_copy_items" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xs modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Replicate Items</h5>
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
              <select id="year" name="year" class="form-control form-control-sm mr-2 mb-2">
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

<script src="{{ asset('js/items.js') }}"></script>
<script>
  var tkn = $('meta[name="csrf-token"]').attr('content');

  $('#btn-replicate').on('click', function(){
    var year = $('#year').val();

    if (year == ""){
      message('Empty', 'red', 'Please select a year!');
    }
    else{
      $.ajax({
        headers: {
            'x-csrf-token': tkn
        },
        url: '/items.replicateitems',
        method: 'POST',
        data: {'year': year},
        dataType: 'HTML',
        success: function(result) {
          if (result == 1){
            message('Success', 'green', 'Items from year ' + year + ' successfully replicated!');
            $('#modal_copy_items').modal('hide');
            request('itemsRetrieveItems', 'POST', {'status' : 1}, 'HTML', '#list', '#page_loading');
          }
          else if(result == 2){
            message('<i class="fas fa-info mr-2"></i>Info', 'blue', 'No items from year ' + year + '.');
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
  })
</script>