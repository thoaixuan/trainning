@extends('layouts.users')
@section('main')
<div class="autentication-bg">

    <div class="container-lg">
        <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-4 d-flex justify-content-center">
                    <a href="index.html">
                        <img src="../assets/images/brand-logos/desktop-white.png" alt="logo">
                    </a>
                </div>
                <form action="{{route("register.post")}}" method="POST" class="card custom-card" id="register-form">
                    @csrf
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Đăng ký tài khoản</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome &amp; Join us by creating a free account !</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signup-fullname" class="form-label text-default">Họ và tên</label>
                                <input type="text" class="form-control form-control-lg" id="signup-fullname" name="fullname" placeholder="Họ và tên">
                            </div>
                            <div class="col-xl-12">
                                <label for="signup-email" class="form-label text-default">Email</label>
                                <input type="text" class="form-control form-control-lg" id="signup-email" name="email" placeholder="Email">
                            </div>
                            <div class="col-xl-12">
                                <label for="signup-password" class="form-label text-default">Mật khẩu</label>
                                <div class="input-groups">
                                    <input type="password" class="form-control form-control-lg" id="signup-password" name="signuppassword" placeholder="Mật khẩu">
                                    {{-- <button aria-label="button" class="btn btn-light" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button> --}}
                                </div>
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signup-confirmpassword" class="form-label text-default">Xác nhận mật khẩu</label>
                                <div class="input-groups">
                                    <input type="password" class="form-control form-control-lg" id="signup-confirmpassword" name="confirmpassword" placeholder="Xác nhận mật khẩu">
                                    {{-- <button aria-label="button" class="btn btn-light" type="submit" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button> --}}
                                </div>
                                <div class="form-check mt-3">
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        By creating a account you agree to our <a href="terms_conditions.html" class="text-success"><u>Terms &amp; Conditions</u></a> and <a class="text-success"><u>Privacy Policy</u></a>
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" name="term" id="defaultCheck1">
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary" data-id="">Tạo tài khoản mới</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mt-3">Bạn đã có tài khoản? <a href="{{route('login')}}" class="text-primary">Đăng nhập</a></p>
                        </div>
                        <div class="text-center my-3 authentication-barrier">
                            <span>OR</span>
                        </div>
                        <div class="btn-list text-center">
                            <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                <i class="ri-facebook-fill"></i>
                            </button>
                            <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                <i class="ri-google-fill"></i>
                            </button>
                            <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                <i class="ri-twitter-fill"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/app/acount/acount.js') }}"></script>
<script src="{{asset('/app/main.js')}}"></script>
@endsection
