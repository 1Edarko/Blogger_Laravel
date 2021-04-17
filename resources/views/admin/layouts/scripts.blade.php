<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
//   $.widget.bridge('uibutton', $.ui.button)
//   $(document).ready(function() {
//   $('#summernote').summernote();
// });

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
});
</script>
<script src="{{asset('admin/ckeditor/ckeditor/ckeditor.js')}}"></script>


<script>
 CKEDITOR.replace('ckeditor');
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>


<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

