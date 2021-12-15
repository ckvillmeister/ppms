@php
use App\Http\Controllers\AuthenticationController as Authentication; 
@endphp
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
              <h1>Object of Expenditures</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">Object of Expenditures</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      @if ($id)

      <div class="row m-3">
        <div class="col-sm-6">
            @if (Authentication::isAuthorized(Auth::user()->role, 'objectNew'))<button class="btn btn-sm btn-primary" id="new"><i class="fas fa-plus mr-4"></i>New</button>@endif
            @if (Authentication::isAuthorized(Auth::user()->role, 'objectViewActive'))<button class="btn btn-sm btn-secondary" id="active"><i class="fas fa-check mr-2"></i>Active</button>@endif
            @if (Authentication::isAuthorized(Auth::user()->role, 'objectViewInactive'))<button class="btn btn-sm btn-danger" id="inactive"><i class="fas fa-trash mr-2"></i>Inactive</button>@endif
        </div>
        <div class="col-sm-6">
          <div class="float-right">
            Department / Office: <strong>{{ ($info->sub_office) ? $info->office_name.' - '.$info->sub_office : $info->description }}<strong>
          </div>
        </div>
      </div>

      <div class="row bg-white">
        <div class="col-sm-12 pt-1">

            <div class="row m-3">
                <div class="col-sm-12 align-self-center">
                    <input type="hidden" id="deptid" value="{{ app('request')->input('id') }}">
                    <div id="list"></div>
                </div>
            </div>
        </div>
      </div>

      <br><br>

      @else
          <div class="text-center">
              <div class="alert alert-danger">
                  <h3>
                      <i class="fas fa-exclamation-triangle mr-2"></i>Please select a department first!
                  </h3>
              </div>
          </div>
      @endif

    </div>
    @include('components.footer')
</div>
</body>
</html>

<div class="modal fade" id="modal_new" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Object of Expenditure Form</h5>
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

<script type="text/javascript">

  retrieveObjects(1);
  $('#new').on('click', function(){
    $('#reset').click(); 
    $('#modal_new').modal({
        backdrop: 'static',
        keyboard: true, 
        show: true});

    request('/object/getform', 'POST', {'deptid' : 0}, 'HTML', '#form', '#form_loading');
  });

  $('#active').on('click', function(){
    retrieveObjects(1);
  });

  $('#inactive').on('click', function(){
      retrieveObjects(0);
  });

  $('body').on('click', '#edit', function(){
      var id = $(this).val(); 

      request('/object/getform', 'POST', {'id' : id}, 'HTML', '#form', '#form_loading');

      $('#modal_new').modal({
          backdrop: 'static',
          keyboard: true, 
          show: true});
  });

  $('body').on('click', '#delete', function(){
      var id = $(this).val();

      $.confirm({
          title: 'Confirm',
          type: 'blue',
          content: 'Are you sure you want to remove this object of expenditure?',
          buttons: {
              confirm: function () {
                  toggleStatus(id, 0);
              },
              cancel: function () {
                  
              }
          }
      });
      
  });

  $('body').on('click', '#reactivate', function(){
      var id = $(this).val(); 
      
      $.confirm({
          title: 'Confirm',
          type: 'blue',
          content: 'Are you sure you want to re-activate this object of expenditure?',
          buttons: {
              confirm: function () {
                  toggleStatus(id, 1);
              },
              cancel: function () {
                  
              }
          }
      });
  });

  $('body').on('submit', '#frm', function(e){
    e.preventDefault();
    var obj_exp_name = $('#obj_exp_name').val(),
    class_exp = $('#class_exp').val();
        
    if (class_exp === ''){
        message('Error', 'red', 'Please select class of expenditure!');
    }
    else if (obj_exp_name === ''){
        message('Error', 'red', 'Please provide object of expenditure name!');
    }
    else{
        create($(this).serialize());
    }
  });

  function create(frm){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/object/create',
        method: 'POST',
        data: frm,
        setCookies: token,
        dataType: "JSON",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            $('#modal_new').modal('hide');
            message(result['result'], result['color'], result['message']);
            retrieveObjects(1);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
  }

  function toggleStatus(id, status){
    $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/object/togglestatus',
        method: 'POST',
        data: {'id' : id, 'status' : status},
        setCookies: token,
        dataType: "HTML",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            var stat = 0;

            if (status == 1){
                stat = 0;
            }
            else if (status == 0){
                stat = 1;
            }

            retrieveObjects(stat);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
  }

  function retrieveObjects(status){
      var deptid = $('#deptid').val(); 
      
      $.ajax({
        headers: {
            'x-csrf-token': token
        },
        url: '/object/retrieveobjectsforbudget',
        method: 'POST',
        data: {'status': status, 'deptid': deptid},
        setCookies: token,
        dataType: "HTML",
        beforeSend: function() {
            $('#basicloader').show();
        },
        complete: function(){
            $('#basicloader').hide();
        },
        success: function(result) {
            $('#list').html(result);
        },
        error: function(obj, msg, exception){
            message('Error', 'red', msg + ": " + obj.status + " " + exception);
        }
    })
  }
</script>