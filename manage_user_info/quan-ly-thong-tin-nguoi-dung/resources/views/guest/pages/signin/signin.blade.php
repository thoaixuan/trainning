@extends('guest.layouts.sign')

@section('content')
<section class="login-area another-page pt-60">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6 bg-white card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="login-information pb-30 card-body ">
                    <div class="text-center ">
                    <h2 class="text-muted card-title">Đăng nhập</h2>
                    </div>
                    <form class="login-form" method="post" id="login-form" name="login">
                    @method('post')
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
<script src="{{asset('themes/guest/js/signin/signin.js')}}"></script>
<script>
  var signin=new signin();
      signin.datas={
        routes:{
            login:"{{route('guest.post_signin.home')}}",
        }
      }
      signin.init();
</script>
@endsection