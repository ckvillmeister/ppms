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
              <h1>Departments / Offices</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">Departments / Offices</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3">
        <div class="col-sm-12">
            @if (Authentication::isAuthorized(Auth::user()->role, 'deptNew'))<button class="btn btn-sm btn-primary" id="new"><i class="fas fa-plus mr-4"></i>New</button>@endif
            @if (Authentication::isAuthorized(Auth::user()->role, 'deptViewActive'))<button class="btn btn-sm btn-secondary" id="active"><i class="fas fa-check mr-2"></i>Active</button>@endif
            @if (Authentication::isAuthorized(Auth::user()->role, 'deptViewInactive'))<button class="btn btn-sm btn-danger" id="inactive"><i class="fas fa-trash mr-2"></i>Inactive</button>@endif
        </div>
      </div>

      <div class="row bg-white">
        <div class="col-sm-12 pt-4">
          <div id="list"></div>
        </div>
      </div>
    </div>
    @include('components.footer')
    <script src="{{ asset('js/departments.js') }}"></script>
</div>
</body>
</html>
<div class="modal fade" id="modal_new" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Department Information Form</h5>
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



