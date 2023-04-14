@extends('layouts.login')
@section('main')
    
    <div class="cont container-fluid">
      
        <div class="row h-100">
            <div class="col-lg-12 position-relative">

            <img src="{{ asset('theme/assets/img/bg-login.png') }}" class="position-absolute top-50 start-50 translate-middle object-fit-cover">
            
                <form id="login-form" onsubmit="return false" class="login__form position-absolute ">
                    @csrf
                    <h4 class="mb-4">Welcome to <span><h1 class="fw-bold">My Note</h1></span> </h4>
                    
                    <div class="form-group mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="w-100 d-flex mt-4">
                        <button id="btnLogin" type="submit"  class="btn btn-primary w-50 ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/app/login/login.js') }}"></script>
@endsection
