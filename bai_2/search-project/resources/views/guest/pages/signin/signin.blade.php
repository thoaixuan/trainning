@extends('guest.layouts.sign')

@section('content')

<section class="login-area another-page pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="login-information pb-150">
                    <h2>Hey There!</h2>
                    <p>Welcome Back. <br>
                    You are just one step away to your feed.</p>
                    <form action="#" class="login-form">
                        <div class="text-field">
                            <input type="text" placeholder="User Name">
                        </div>
                        <div class="password-field">
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="signin-button-wrap">
                            <button type="submit" class="btn-bg2">Sign In</button>
                            <div class="forgot-text"><a href="#">Forgot Password</a></div>
                        </div>

                    </form>
                    <div class="or-text">or</div>
                    <div class="share-btn-wrap">
                        <div class="facebook-btn">
                            <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        </div>
                        <div class="twitter-btn">
                            <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        </div>
                        <div class="google-btn">
                            <a href="#"><i class="fa fa-google"></i><span>Google</span></a>
                        </div>
                    </div> 
                    <div class="alternative-login">
                        Don't have an account yet ? <a class="signup-link" href="#"> Sign Up!</a>
                    </div> 
                </div>
            </div>
            <div class="col-lg-4 login-image-wrap d-flex align-items-center">
                <div class="login_img">
                    <img src="{{asset('guest\assets\img\login-signup\login.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection