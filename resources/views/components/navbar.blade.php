<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!--<li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>-->
  </ul>

  <!-- SEARCH FORM -->
      <!-- <form action="" method="POST">
        <div class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="text_search_supporter" type="search" placeholder="Quick Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </form> -->

  <ul class="navbar-nav ml-auto">
   
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <h4 class="mr-2"><i class="fas fa-user"></i></h4>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/avatar100x100.jpg') }}">
            </div>
            <h3 class="profile-username text-center">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</h3>
          </div>
          <div class="dropdown-divider"></div>
          <!--
          <a href="#" class="dropdown-item">
            <i class="fas fa-cog ml-3 mr-3"></i> Account Settings
          </a>-->
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_change_password">
            <i class="fas fa-key ml-3 mr-3"></i> Change Password
          </a>
          <a href="/authenticate/logout" class="dropdown-item">
            <i class="fas fa-undo ml-3 mr-3"></i> Logout
          </a>
        </div>
      </div>
    </li>
    <!--<li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
          class="fas fa-th-large"></i></a>
    </li>-->
  </ul>
</nav>

<div class="modal fade" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Change Password</h5>
      </div>

      <div class="modal-body">
        <form id="frmChangePass">

          <div class="row mt-3 password_row">
            <div class="col-lg-4 align-self-center">
                New Password:
            </div>
            <div class="col-lg-8">
                <input type="password" class="form-control form-control-sm" id="newpass" name="newpassword">
            </div>
          </div>

          <div class="row mt-3 password_row">
            <div class="col-lg-4 align-self-center">
                Confirm New Password:
            </div>
            <div class="col-lg-8">
                <input type="password" class="form-control form-control-sm" id="cnewpass" name="cnewpassword">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <div class="float-right">
            <button class="btn btn-sm btn-primary btn_submit_change_pass" value="">Submit</button>
            <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>