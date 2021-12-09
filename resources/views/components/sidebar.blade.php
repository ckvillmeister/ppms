@php
use App\Http\Controllers\AuthenticationController as Authentication; 
@endphp

<aside class="main-sidebar sidebar-dark-secondary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link"> 
    <!-- <div class="text-center"> -->
      <img src="{{ asset('images/TrinidadLogo.png') }}" class="brand-image img-circle elevation-3 mr-3">
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
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

        @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarDashboard'))
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ (Request::path() == 'dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @endif

        @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarSetup'))
        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['departments', 'items', 'categories', 'class', 'object', 'units'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['departments', 'items', 'categories', 'class', 'object', 'units'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>Setup<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarDepartments'))
            <li class="nav-item">
              <a href="/departments" class="nav-link {{ (Request::path() == 'departments') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Departments</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarClassExpenditures'))
            <li class="nav-item">
              <a href="/class" class="nav-link {{ (Request::path() == 'class') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Class of Expenditures</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarObjectExpenditures'))
            <li class="nav-item">
              <a href="/object" class="nav-link {{ (Request::path() == 'object') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Object of Expenditures</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarCategories'))
            <li class="nav-item">
              <a href="/categories" class="nav-link {{ (Request::path() == 'categories') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Categories</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarUnits'))
            <li class="nav-item">
              <a href="/units" class="nav-link {{ (Request::path() == 'units') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Units</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarItems'))
            <li class="nav-item">
              <a href="/items" class="nav-link {{ (Request::path() == 'items') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Manage Items</p>
              </a>
            </li>
            @endif

          </ul>
        </li>
        @endif

        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['ppmp'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['ppmp'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Preparation<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            <!-- @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarMyProcurement'))
            <li class="nav-item">
              <a href="myprocurement" class="nav-link {{ (Request::path() == 'myprocurement') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Procurement</p>
              </a>
            </li>
            @endif -->

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarManageProcurement'))
            <li class="nav-item">
              <a href="/ppmp" class="nav-link {{ (Request::path() == 'ppmp') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                  <p class="text-sm">PPMP</p>
              </a>
            </li>
            @endif

          </ul>
        </li>
        
        @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarReports'))
        <li class="nav-item">
          <a href="/reports" class="nav-link {{ (Request::path() == 'reports') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Reports
            </p>
          </a>
        </li>
        @endif
         
        @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarSettings'))
        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['roles', 'accounts', 'settings', 'roles/managepermissions'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['roles', 'accounts', 'settings', 'roles/managepermissions'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarRoles'))
            <li class="nav-item">
              <a href="/roles" class="nav-link {{ (Request::path() == 'roles' | Request::path() == 'roles/managepermissions') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Roles and Permission</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarAccounts'))
            <li class="nav-item">
              <a href="/accounts" class="nav-link {{ (Request::path() == 'accounts') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">User Accounts</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarSystemSettings'))
            <li class="nav-item">
              <a href="/settings" class="nav-link {{ (Request::path() == 'settings') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">System Settings</p>
              </a>
            </li>
            @endif

          </ul>

        </li>
        @endif

      </ul>
    </nav>
  </div>
</aside>