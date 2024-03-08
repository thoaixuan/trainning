@extends('layouts.users')
@section('main')
<div class="autentication-bg">

    <div class="container-lg">
        <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-4 d-flex justify-content-center">
                    <a href="index.html">
                        <img src="../assets/images/brand-logos/desktop-white.png" alt="logo">
                    </a>
                </div>
                <form action="{{route('login.post')}}" method="POST" class="card custom-card" id="login-form">
                    @csrf
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Đăng nhập</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back!</p>
                        <div  class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signin-emaillogin" class="form-label text-default">Email đăng nhập</label>
                                <input type="text" class="form-control form-control-lg" id="signin-emaillogin" name="email" placeholder="Email đăng nhập">
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-password" class="form-label text-default d-block">Mật khẩu<a href="reset-password.html" class="float-end text-danger">Quên mật khẩu ?</a></label>
                                <div class="input-groups">
                                    <input type="password" class="form-control form-control-lg" id="signin-password" name="password" placeholder="Mật khẩu">
                                    {{-- <button class="btn btn-light" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button> --}}
                                </div>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                            Lưu mật khẩu ?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button class="btn btn-lg btn-primary" type="submit" id="btnLogin">Đăng nhập</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mt-3">Bạn chưa có tài khoản? <a href="{{route('register')}}" class="text-primary">Đăng ký</a></p>
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
