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

        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['departments/set', 'object/setbudget'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['departments/set', 'object/setbudget'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>Setup<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarSetDepartment'))
            <li class="nav-item">
              <a href="/departments/set" class="nav-link {{ (Request::path() == 'departments/set') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Departments</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarObjectsSetBudget'))
            <li class="nav-item">
              <a href="/object/setbudget" class="nav-link {{ (Request::path() == 'object/setbudget') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">Object of Expenditure</p>
              </a>
            </li>
            @endif

          </ul>
        </li>
        
        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['ppmp'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['ppmp'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Preparation<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarPPMP'))
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
        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['reports/app'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['reports/app'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Reports<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="/reports/app" class="nav-link {{ (Request::path() == 'reports/app') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">APP</p>
              </a>
            </li>

          </ul>
        </li>
        @endif
         
        <li class="nav-item has-treeview {{ (in_array(Request::path(), ['departments', 'items', 'categories', 'class', 'object', 'units', 'roles', 'accounts', 'settings', 'roles/managepermissions'])) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (in_array(Request::path(), ['departments', 'items', 'categories', 'class', 'object', 'units', 'roles', 'accounts', 'settings', 'roles/managepermissions'])) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarDepartments'))
            <li class="nav-item">
              <a href="/departments" class="nav-link {{ (Request::path() == 'departments') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">List of Departments</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarClassExpenditures'))
            <li class="nav-item">
              <a href="/class" class="nav-link {{ (Request::path() == 'class') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">List of Class</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarObjectExpenditures'))
            <li class="nav-item">
              <a href="/object" class="nav-link {{ (Request::path() == 'object') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">List of Objects</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarCategories'))
            <li class="nav-item">
              <a href="/categories" class="nav-link {{ (Request::path() == 'categories') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">List of Categories</p>
              </a>
            </li>
            @endif

            @if (Authentication::isAuthorized(Auth::user()->role, 'sidebarUnits'))
            <li class="nav-item">
              <a href="/units" class="nav-link {{ (Request::path() == 'units') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p class="text-sm">List of Units</p>
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

            <br><br>

          </ul>

        </li>
        
      </ul>
    </nav>
  </div>
</aside>