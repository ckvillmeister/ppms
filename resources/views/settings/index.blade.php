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
              <h1>System Settings</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="myprocurement">Home</a></li>
                <li class="breadcrumb-item active">System Settings</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3 bg-white">
        <div class="col-sm-12 pt-4">
        <div class="card p-3 card-primary card-outline">
              <div class="row">
                <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">System Information</a>
                  <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Back-up Database</a>
                  <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">System Images</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                      <br>
                      <form id="frm">
                        <div class="row">
                          <div class="col-lg-12 align-self-center text-center">
                            <h4>System Information</h4>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-lg-3 align-self-center">
                              System Name:
                          </div>
                          <div class="col-lg-6">
                              <input type="text" class="form-control" value="{{ ($settings[0]->setting_description) ? $settings[0]->setting_description : '' }}" id="system_name" name="system_name">
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-lg-3 align-self-center">
                              Procurement Year:
                          </div>
                          <div class="col-lg-6">
                              <input type="number" class="form-control" value="{{ ($settings[1]->setting_description) ? $settings[1]->setting_description : '' }}" id="proc_year" name="proc_year">
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-lg-3 align-self-center">
                              Procurement Status
                          </div>
                          <div class="col-lg-6">
                            <input type="checkbox" name="proc_status" id="proc_status" {{ ($settings[2]->setting_description) ? 'checked' : '' }} data-bootstrap-switch>  
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-lg-12 align-self-center">

                            <div class="float-right">
                              <button class="btn btn-sm btn-primary" id="btn_submit"><icon class="fas fa-thumbs-up mr-2"></icon>Submit</button>
                            </div>
                          </div>
                        </div> 
                    </form>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    <br><br>
                    <div class="text-center">
                        <a class="btn btn-md btn-success" href="settings.backupDatabase"><i class="fas fa-database mr-2"></i>Click Me to Back-up Database</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                    
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                     
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <br><br>

    </div>
    @include('components.footer')
</div>
</body>
</html>
<script src="{{ 'adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js' }}"></script>
<script>
$('#frm').on('submit', function(e){
  e.preventDefault();

  var sys_name = $('#system_name').val(),
      proc_year = $('#proc_year').val(),
      status = $('#proc_status').val();
      
  if (sys_name === '' | sys_name === null){
      message('Error', 'red', 'Please system name!');
  }
  else if (proc_year === '' | proc_year === null){
      message('Error', 'red', 'Please provide procurement year!');
  }
  else{
      request('settings.save', 'POST', $(this).serialize(), 'JSON');
  }
});

$("#proc_status").bootstrapSwitch();

$("#proc_status").on('switchChange.bootstrapSwitch', function(e, state){
  var status = 0;

  if (state == true){
    status = 1
  }

  request('settings.toggleStatus', 'POST', {'status': status}, 'HTML');
})

$("#backupDB").on('click', function(){
  request('settings.backupDatabase', 'POST', null, 'JSON');
})
</script>