<!doctype html>
<html class="no-js " lang="vi" data-vue-meta-server-rendered>

<head>
    <meta charset="utf-8">
    <!-- <base href="/"/> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="e-Gate, e-Gate Center, e-Gate Vũng Tàu, e-Gate Vung Tau">
    <meta data-vmid="description" name="description" content="Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích.">
    <title>{!! isset($title)?$title:'e-Gate - Kết nối kỷ nguyên công nghệ' !!}</title>
    <link rel="icon" href="{{asset('themes/assets/images/logo/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->
    {!! SEO::generate() !!}
    {!!isset($meta)?'':''!!}
    {!!isset($append_meta)?$append_meta:''!!}
    {{-- {!! SEOMeta::generate() !!} --}}
    {{-- {!! OpenGraph::generate() !!} --}}
    {{-- {!! Twitter::generate() !!} --}}
    {{-- {!! JsonLd::generate() !!} --}}
    {{-- {!! JsonLdMulti::generate() !!} --}}
    @if(Session::get('payload'))
        <script> 
            var payload = {!!json_encode(Session::get('payload'))!!};
        </script>
    @endif
    @include('guest.partials.stylesheet')
</head>
<body>
<div id="mainDiv" class="theme-blue">
<div id="app" class="main--top">
    <main-component></main-component>
</div>
<div id="app-client-dahboard"></div>
</div>
@include('guest.partials.scripts')
@yield('jsGuest')
</body>
</html> 








