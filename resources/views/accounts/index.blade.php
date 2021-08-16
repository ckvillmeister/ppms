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
              <h1>User Accounts</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">User Accounts</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-success" id="newAccount"><i class="fas fa-plus mr-2"></i>New User</button>
            <button class="btn btn-sm btn-secondary" id="active"><i class="fas fa-check mr-2"></i>Active</button>
            <button class="btn btn-sm btn-danger" id="inactive"><i class="fas fa-trash mr-2"></i>Inactive</button>
        </div>
      </div>

      <div class="row m-3 bg-white">
        <div class="col-sm-12 pt-4">
          <div id="accountlist"></div>
        </div>
      </div>

    </div>
    @include('components.footer')
</div>
</body>
</html>

<div class="modal fade" id="modal_new_account" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Account Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="overlay-wrapper" id="form_loading"></div>
      </div>
      <div class="modal-body">
        <div id="new_account_form"></div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/accounts.js') }}"></script>