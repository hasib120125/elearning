@extends('layouts.auth')
@section('page-title', 'Reset Password - Info360')
@section('content')
<div class="section-lower">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
	<div class="row">
		<div class="wrapper">
			<div class="sign-in-form">
        <div class="text-center">
          <h3>Reset your password</h3>
        </div>
				<form action="{{ route('password.email')}}" method="post">
					{{ csrf_field() }}
					<label>Email Address</label>
					<input type="text" name="email" placeholder="Email" required="">
          @if($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}
          @endif
					<!-- <a href="#" class="pass">Forgot Password?</a> -->
					<input type="submit" value="Send Password Reset Link">
				</form>
				<a href="{{ route('login')}}">Remeber password?</a>
			</div>
		</div>
	</div>
</div>
@endsection
