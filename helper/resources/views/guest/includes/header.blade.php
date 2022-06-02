<section name="header">
    <div class="bg-white position-fixed top-0 w-100 mb-100  header-content">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="container-fluid">
                <a class="navbar-brand m-0 header-logo" href="{{route('guest.home.index')}}">
                    @foreach(json_decode(getConfigMail()->website_logo) as $header_logo)
                    <img src="{{url('/uploads').'/'.$header_logo->logo_guest}}" alt="logo" height="46">
                    @endforeach
                </a>
                <a class="navbar-brand m-0 position-relative header-logo" href="{{url('')}}">
                    <div class="text-title m-0" >
                        <a href="{{route('guest.home.index')}}">
                            Trung tâm Hỗ trợ e-Gate
                        </a>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{route('guest.contact.index')}}">Liên hệ</a>
                    </li>
                    <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{route('guest.support.index')}}">Hỗ trợ</a>
                    </li>
                    <li class="nav-item mx-2">
                        <span>
                            <div class="translate" id="google_translate_element"></div>
    
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'vi'}, 'google_translate_element');}
                                </script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </span>
                    </li>
                </ul>
                
                </div>
            </div>
        </nav>

    </div>
</section>