   <!-- JQUERY JS -->
<script src="{{asset('themes/admin/assets/js/jquery.min.js')}}" ></script>

<!-- BOOTSTRAP JS -->
<!-- <script src="{{asset('themes/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script> -->
<script src="{{asset('themes/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- SPARKLINE JS-->
<script src="{{asset('themes/admin/assets/js/jquery.sparkline.min.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('themes/admin/assets/js/sticky.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('themes/admin/assets/js/landing.js')}}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('themes/admin/assets/plugins/select2/select2.full.min.js')}}"></script>

<script src="{{asset('themes/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('themes/admin/assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script src="{{ asset('themes/admin/assets/plugins/toastr/toastr.min.js')}}"></script>
<!-- SHOW PASSWORD JS -->
<script src="{{asset('themes/admin/assets/js/show-password.min.js')}}"></script>
<script>
@php
echo("var editor_content_css = '").asset('themes/admin/assets/plugins/tinymce/editor_content.css')."';\n";
echo("var editor_ui_css = '").asset('themes/admin/assets/plugins/tinymce/editor_ui.css')."';\n";
echo("var load_content = '';");
@endphp
</script>
<!--  Editor -->
<script src="{{asset('themes/admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('app/guest/main.js')}}"></script>
