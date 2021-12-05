@if (Request::path() != '/')
<br><br>
<footer class="main-footer text-center">
    <strong>Copyright &copy; 2021 <a href="#">{{ $settings[0]->setting_description }}</a></strong>
    All rights reserved.
</footer>
@endif
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('adminlte/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-confirm/js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/default.js') }}"></script>