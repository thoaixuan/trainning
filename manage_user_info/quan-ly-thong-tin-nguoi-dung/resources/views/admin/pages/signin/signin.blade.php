@extends('admin.layouts.signin')

@section('content')
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			@if( session('mess'))
            <div style="margin: 10px 5px">
                <span class="text-center" style="color: red;">{{session('mess')}}</span>
            </div>
        @endif
			<form id="login-form" class="login" method="POST" role="form" name="login"> 
       		 @csrf
				<div class="login__field form-group">
					<i class="login__icon fas fa-user"></i>
					<input type="text" id="email" name="email" class="form-controll login__input @error('email') is-invalid @enderror" placeholder="User name / Email" >
				</div>
				<div class="login__field form-group">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="form-controll login__input" placeholder="Password" >
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>Đăng nhập</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>

</div>
@endsection

@section('jsAdmin')
<script src="{{asset('themes/admin/js/signin/signin.js')}}"></script>
<script>
  var signin=new signin();
      signin.datas={
        routes:{
            login:"{{route('admin.post.login')}}",
        }
      }
      signin.init();
</script>
@endsection
