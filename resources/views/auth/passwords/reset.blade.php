@extends('layouts.auth')
@section('page-title', 'Reset Password - Anontech')
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
          <h3>Set new password below</h3>
        </div>
        <form action="{{ route('password.request')}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">

					<label>Email Address</label>
					<input type="text" name="email" placeholder="Email" required="">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required="">

          <label>Confirm Password</label>
          <input type="password" name="password_confirmation" placeholder="Password" required="">
          <input type="submit" value="Reset Password">
        </form>
        <a href="{{ route('login')}}">Remeber password?</a>
      </div>
    </div>
  </div>
</div>
@endsection
