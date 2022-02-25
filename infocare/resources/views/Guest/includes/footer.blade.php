<!--==================================================================== 
                    Start footer section
=====================================================================-->

<footer class="mt-65 footer">
    <div class="container">
        <div class="row">

            <!--big column-->
            <div class="col-md-7">
                <div class="row">

                    <!--Footer Column-->
                    <div class="col-sm-7">
                        <div class="footer-widget logo-widget">
                            <div class="footer-logo"><a href="{{route('guest_home')}}"><img src="{{route('guest_home')}}/guest/img/logo.png" alt=""></a></div>
                            <div class="widget-content">
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat</p>
                                </div>
                                <div class="footer-social-icon">
                                    <ul class="social-icon-one">
                                        <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="tel:+" rel="no-follow"><i class="fa fa-phone"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--big column-->
            <div class="col-md-5">
                <div class="row">

                    <!--Footer Column-->
                    <div class="">
                        <div class="footer-widget links-widget float-lg-right">
                            <h5 class="footer-title">Liên kết</h5>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach (getPages() as $item)
                                    <li>
                                        <a href="{{route('guest_pages',$item->pages_slug)}}">{{$item->pages_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--Copyright-->
    <div class="footer-bottom">
        <div class="copyright">Copyright @ <?=(date("Y"))?> <a href="http://google.com">Sáng.</a> All rights reserved.</div>
    </div>
</footer>


<!--==================================================================== 
                    End footer section
=====================================================================-->