   <!-- JQUERY JS -->
   <script src="{{asset('themes/admin/assets/js/jquery.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('themes/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- SPARKLINE JS-->
<!-- <script src="{{asset('themes/admin/assets/js/jquery.sparkline.min.js')}}"></script> -->

<!-- Sticky js -->
<script src="{{asset('themes/admin/assets/js/sticky.js')}}"></script>


<!-- SIDEBAR JS -->
<script src="{{asset('themes/admin/assets/plugins/sidebar/sidebar.js')}}"></script>



<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('themes/admin/assets/plugins/select2/select2.full.min.js')}}"></script>

<!-- INTERNAL Data tables js-->
<script src="{{asset('themes/admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

<!-- INTERNAL APEXCHART JS -->
<!-- <script src="{{asset('themes/admin/assets/js/apexcharts.js')}}"></script> -->
<!-- <script src="{{asset('themes/admin/assets/plugins/apexchart/irregular-data-series.js')}}"></script> -->



<!-- INTERNAL Vector js -->
<script src="{{asset('themes/admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('themes/admin/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

<!-- SIDE-MENU JS-->
<script src="{{asset('themes/admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- QUILL JS-->
<script src="{{asset('themes/admin/assets/plugins/quill/quill.min.js')}}"></script>

<!-- Color Theme js -->
<script src="{{asset('themes/admin/assets/js/themeColors.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('themes/admin/assets/js/custom.js')}}"></script>


<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('themes/admin/assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
@php
echo("var editor_content_css = '").asset('themes/admin/assets/plugins/tinymce/editor_content.css')."';\n";
echo("var editor_ui_css = '").asset('themes/admin/assets/plugins/tinymce/editor_ui.css')."';\n";
echo("var load_content = '';");
@endphp
</script>
<!--  Editor -->
<script src="{{asset('themes/admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('app/admin/main.js')}}"></script>
