@php
use App\Http\Controllers\AuthenticationController as Authentication; 
@endphp

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
              <h1>Manage Role Permissions</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/roles">Roles</a></li>
                <li class="breadcrumb-item active">Manage Role Permissions</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <div class="row m-3 bg-white">
        <div class="col-sm-12">

            @foreach ($category as $categ)
              <h4 class="mt-3 ml-3">{{ $categ->category }}</h4>
              <div class="row pb-3" id="permissions">
                  @foreach ($permissions as $key => $permission)
                    @if ($permission->category == $categ->id)
                      <div class="col-sm-6 pt-3 pl-3 pr-3">
                        <div class="bg-light p-2">
                          <h5>
                            <input type="checkbox" value="{{ $permission->id }}" class="mr-3" {{ (Authentication::hasAccess(Request::get('id'), $permission->id)) ? 'checked="checked' : '' }}>{{ $permission->description }}
                          </h5>
                        </div>
                      </div>
                    @endif
                  @endforeach
              </div>
              <br>
            @endforeach
        </div>
      </div>

      <div class="row m-3 bg-white">
        <div class="col-sm-12">
          <div class="m-3 float-right">
            <button class="btn btn-md btn-primary" id="save" value="{{ Request::get('id') }}"><i class="fas fa-save mr-2"></i>Save</button>
          </div>
        </div>
      </div>
      
      <br><br>

    </div>
    @include('components.footer')
</div>
</body>
</html>

<script src="{{ asset('js/permissions.js') }}"></script>