@extends('guest.layouts.sign')

@section('content')
<section class="login-area another-page pt-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login-information pb-150">
                    <h2>Đăng nhập</h2>
                    <form class="login-form" method="post" id="login-form" name="login">
                    @csrf
                        <div class="text-field form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email">
                        </div>
                        <div class="password-field form-group">
                            <input class="form-control " type="password" placeholder="Password" name="password">
                        </div>
                        <div class="signin-button-wrap">
                            <button type="submit" class="btn-bg2">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('jsGuest')
@endsection