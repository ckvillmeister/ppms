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
          <a href="myprocurement" class="nav-link {{ (Request::path() == 'myprocurement') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              My Procurement
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="manageprocurement" class="nav-link {{ (Request::path() == 'manageprocurement') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Manage Procurement
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

        <li class="nav-item has-treeview {{ (Request::path() == 'departments') ? 'menu-open' : 
                                                      (Request::path() == 'items') ? 'menu-open' : 
                                                      (Request::path() == 'categories') ? 'menu-open' : 
                                                      (Request::path() == 'objects') ? 'menu-open' : 
                                                      (Request::path() == 'units') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (Request::path() == 'departments') ? 'active' : 
                                                      (Request::path() == 'items') ? 'active' : 
                                                      (Request::path() == 'categories') ? 'active' : 
                                                      (Request::path() == 'objects') ? 'active' : 
                                                      (Request::path() == 'units') ? 'active' : '' }}">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Maintenance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="departments" class="nav-link {{ (Request::path() == 'departments') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Departments</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="items" class="nav-link {{ (Request::path() == 'items') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Items</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="objects" class="nav-link {{ (Request::path() == 'objects') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Object of Expenditures</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="categories" class="nav-link {{ (Request::path() == 'categories') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="units" class="nav-link {{ (Request::path() == 'units') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Units</p>
              </a>
            </li>

          </ul>

        <li class="nav-item has-treeview {{ (Request::path() == 'roles') ? 'menu-open' : 
                                            (Request::path() == 'accounts') ? 'menu-open' : 
                                            (Request::path() == 'settings') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{  (Request::path() == 'roles') ? 'active' : 
                                          (Request::path() == 'accounts') ? 'active' : 
                                          (Request::path() == 'settings') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

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