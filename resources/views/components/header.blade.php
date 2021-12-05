<title>{{ $settings[0]->setting_description }}</title>
<link rel="icon" href="{{ asset('images/TrinidadLogo.png') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/jquery-confirm/css/jquery-confirm.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="basicloader" style="display:none;width: 100%;position: fixed;left: 0px;top: 0px;height: 100%;z-index: 10000;background-color:rgba(0,0,0,0.5);">
    <img src="/images/loader.gif" style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;margin: auto;width: 80px;height: auto;">
    <div style="position: absolute;top: 150px;left: 0px;right: 0px;bottom: 0px;margin: auto; width: 100%;height: 100px;text-align:center; padding-top:20px" ><h3 style="color:white;" id="basic-loader-msg">Loading...</h3></div>
</div>