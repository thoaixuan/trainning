<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- 
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex"> 
    -->
    <!-- FAVICON -->
    
    @foreach(json_decode(settings()->website_logo) as $header_logo)
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/uploads/website').'/'.$header_logo->favicon}}" />
    @endforeach
    <!-- TITLE -->
    @include('guest.partial.stylesheet')

   
</head>

<body class="app ltr landing-page horizontal">

    <!-- /GLOBAL-LOADER -->
    @include('guest.includes.prevload')
    
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            @include('guest.includes.header')
            @yield('main')
        </div>
        @include('guest.includes.footer')
        @include('guest.components.delete')
        @include('guest.includes.backtotop')
        @include('guest.partial.scripts')
        @yield('jsGuest')
    </div>

</body>

</html>