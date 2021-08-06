<html>

<head>
@include('components.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')

    <div class="content-wrapper">
      
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Reports</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="error-page">
          <h2 class="headline text-danger"> 403 </h2>

          <div class="error-content">
            <br>
            <h3 class="mt-3"><i class="fas fa-exclamation-triangle text-danger"></i> Forbidden!</h3>
            <p>You are restricted from accessing this page</p>
          </div>
        </div>
      </section>

    </div>
    @include('components.footer')
</div>
</body>
</html>