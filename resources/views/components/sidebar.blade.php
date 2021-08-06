<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link"> 
    <!-- <div class="text-center"> -->
      <img src="{{ asset('images/DBMlogo.png') }}" class="brand-image img-circle elevation-3 mr-3">
      <span class="brand-text font-weight-light">
        <?php
              $sys_title_arr = explode(' ', $settings[0]['setting_description']);
              $initials = '';
              foreach ($sys_title_arr as $key => $word) {
                 $initials .= substr($word, 0, 1);
              }
        ?>
        <strong><?php echo $initials ?></strong>
      </span>
    <!-- </div> -->
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="dashboard" class="nav-link {{ (Request::path() == 'dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="procurement" class="nav-link {{ (Request::path() == 'procurement') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              My Procurement
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="reports" class="nav-link {{ (Request::path() == 'reports') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Reports
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Maintenance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="offices" class="nav-link {{ (Request::path() == 'offices') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Offices</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="items" class="nav-link {{ (Request::path() == 'items') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Items</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="roles" class="nav-link {{ (Request::path() == 'roles') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles and Permission</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="accounts" class="nav-link {{ (Request::path() == 'accounts') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Accounts</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="settings" class="nav-link {{ (Request::path() == 'settings') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>System Settings</p>
              </a>
            </li>

          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>