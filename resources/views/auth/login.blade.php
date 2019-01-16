@extends('layouts.auth')
@section('page-title', 'Login - Info360')
@section('content')
<div class="login-form-door">
<div class="login-form">
{!! Form::open(['id'=>'model-form','route' => 'login','method'=>'POST']) !!}
	<div class="form-group {{ $errors->has('username')? 'has-error':''}}">
		<label for="phone">Enter your Username</label>

			{!! Form::text('username', null, array('placeholder' => 'username','class' => 'form-control')) !!}
			@if($errors->has('username'))
			<span class="help-block" style="color:#fff">{{ $errors->first('username')}}</span>
			@endif

	</div>
	<div class="form-group">
		<label for="password">Password</label>
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		<input class="btn-login" type="submit" name="type" value="Login">
	</div>
	{!! Form::close() !!}
</div>
</div>
@endsection
