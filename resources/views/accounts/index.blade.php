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
              <h1>User Accounts</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">User Accounts</li>
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
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">User Account Form</h5>
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

<div class="modal fade" id="modal_reset_password" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header card-primary card-outline">
        <h5 class="modal-title" id="modal_title">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="reset_pass_frm">

          <input type="hidden" id="resetpassid" name="resetpassid" value=""> 

          <div class="row mt-3" id="password_field">
              <div class="col-lg-3 align-self-center">
                  New Password:
              </div>
              <div class="col-lg-9">
                  <input type="password" class="form-control form-control-sm" placeholder="New Password" id="newpassword" name="newpassword" value="" style="padding-left: 20px">
              </div>
          </div>

          <div class="row mt-3" id="password_field">
              <div class="col-lg-3 align-self-center">
                  Confirm Password:
              </div>
              <div class="col-lg-9">
                  <input type="password" class="form-control form-control-sm" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" value="" style="padding-left: 20px">
              </div>
          </div>

          <div class="row mt-3">
              <div class="col-lg-8">
                  <span id="message"></span>
              </div>
              <div class="col-lg-4">
                  <div class="float-right">
                  <input type="submit" class="btn btn-sm btn-primary" id="btnchangepass" value="Submit">
                  <input type="reset" class="btn btn-sm btn-primary" id="reset" value="Reset">
                  </div>
              </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/accounts.js') }}"></script>