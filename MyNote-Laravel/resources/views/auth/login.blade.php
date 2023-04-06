@extends('layouts.login')
@section('main')
    <div class="cont container-fluid">
        <div class="row h-100">
            <div class="col-lg-12 position-relative">

            <img src="{{ asset('storage/assets/img/bg-login.png') }}" class="position-absolute top-50 start-50 translate-middle object-fit-cover">
            
                <form class="login__form position-absolute " method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4 class="mb-4">Welcome to <span><h1 class="fw-bold">My Note</h1></span> </h4>
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <div class="w-100 d-flex ">
                        <button id="btnLogin" type="submit"  class="btn btn-primary w-50 ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
