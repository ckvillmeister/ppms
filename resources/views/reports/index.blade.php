<html>

<head>
@include('components.header')
<style>
  #tbl_ppmp, #tbl_app{
    font-size: 10pt
  }

  .numerical-cols {
    text-align: right
  }

  .font {
    font-size: 10pt
  }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('images/TrinidadLogo.png') }}" alt="DBMLogo" height="500" width="480">
    </div>

    <div class="content-wrapper">

      <div class="overlay-wrapper text-center" id="page_loading"></div>
      
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Reports</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3">
        <div class="card card-primary card-tabs" style="width: 100%">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-ppmp-tab" data-toggle="pill" href="#custom-tabs-one-ppmp" role="tab" aria-controls="custom-tabs-one-ppmp" aria-selected="true">PPMP</a>
              </li>
              @if (in_array(Auth::user()->role, [1, 2]))
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-app-tab" data-toggle="pill" href="#custom-tabs-one-app" role="tab" aria-controls="custom-tabs-one-app" aria-selected="false">APP</a>
              </li>
              @endif
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-ppmp" role="tabpanel" aria-labelledby="custom-tabs-one-ppmp-tab">
                <div class="row">
                  <div class="col-lg-5">
                    <select id="cbo_departments" class="form-control form-control-sm mr-2 mb-2" {{  (!(in_array(Auth::user()->role, [1, 2]))) ? 'disabled' : '' }}>
                      <option value="">- Select Office / Department -</option>
                      @foreach ($departments as $department)
                      <option value="{{ $department->id }}" {{  (in_array(Auth::user()->role, [1, 2])) ? '' : ($department->id == Auth::user()->department) ? 'selected="selected"' : '' }}> {{ ($department->sub_office) ? $department->description.' ('.$department->sub_office.')' : $department->description }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button class="btn btn-sm btn-success" id="displayppmp"><i class="fas fa-paper-plane mr-2"></i>GO</button>
                  </div>
                  <div class="col-lg-5">
                    <div class="float-right">
                      <button class="btn btn-sm btn-success" id="export_ppmp"><i class="fas fa-file-excel mr-2"></i>Export</button>
                      <button class="btn btn-sm btn-secondary" id="print_ppmp"><i class="fas fa-print mr-2"></i>Print</button>
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div id="display_ppmp"></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-app" role="tabpanel" aria-labelledby="custom-tabs-one-app-tab">
                <div class="row">
                  <div class="col-lg-5">
                    <select id="app_format" class="form-control form-control-sm mr-2 mb-2">
                      <option value="">- Select APP Format -</option>
                      <option value="APPDILG">DILG Format</option>
                      <option value="APPDBM">DBM Format</option>
                      <option value="APPCSE">CSE Format</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button class="btn btn-sm btn-success" id="displayapp"><i class="fas fa-paper-plane mr-2"></i>GO</button>
                  </div>
                  <div class="col-lg-5">
                    <div class="float-right">
                      <button class="btn btn-sm btn-success" id="export_app"><i class="fas fa-file-excel mr-2"></i>Export</button>
                      <button class="btn btn-sm btn-secondary" id="print_app"><i class="fas fa-print mr-2"></i>Print</button>
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div id="display_app"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    @include('components.footer')
</div>
</body>
</html>

<script src="{{ asset('js/report.js') }}"></script>
<script src="{{ asset('adminlte/plugins/table2excel/js/table2excel.js') }}"></script>
<script type="text/javascript">
  $('#cbo_departments').select2({ dropdownCssClass: "font" });
</script>