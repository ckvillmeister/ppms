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
                <h1>Review Procurement</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Review Procurement</li>
                </ol>
                </div>
            </div>
            </div>
        </section>
        
        <div class="row m-3">
            <div class="col-lg-5">
            
                <select id="cbo_departments" class="form-control form-control-sm mr-2 mb-2">
                    <option value="">- Select Office / Department -</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"> {{ ($department->sub_office) ? $department->office_name.' ('.$department->sub_office.')' : $department->description; }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-1">
              <button class="btn btn-sm btn-success" id="go"><i class="fas fa-paper-plane mr-2"></i>GO</button>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-2">
              Procurement for Year: <strong>{{ $settings[1]->setting_description }}</strong>
            </div>
        </div>

        <div class="row m-3">
          
            <div class="col-sm-12">
                <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-list mr-2"></i>Procurement List</h3>
                    </div>
                    <div class="card-body">
                      <div id="procurement_review_list">
                        
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="float-right">
                        <button type="button" class="btn btn-sm btn-danger" id="remove_proc_items">
                          <i class="fas fa-trash mr-2"></i>Delete Selected
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" id="save_procurement">
                          <i class="fas fa-cart-arrow-down mr-2"></i>Save Procurement
                        </button>
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

<script src="{{ asset('js/review.js') }}"></script>
<script type="text/javascript">
</script>
