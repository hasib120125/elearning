@extends('layouts.auth')
@section('page-title', 'Change Password - eTraining')
@section('content')
{!! Form::open(array('id'=>'create-form','route' => 'users.change-password','method'=>'POST')) !!}
	<div class="form-group {{ $errors->has('current_password')? 'has-error':''}}">
		<label for="phone">Enter your Current Password</label>
		{!! Form::password('current_password', array('placeholder' => 'Current Password','class' => 'form-control')) !!}
		@if($errors->has('current_password'))
		<span class="help-block" style="color:#fff">{{ $errors->first('current_password')}}</span>
		@endif
	</div>
	<div class="form-group {{ $errors->has('password')? 'has-error':''}}">
		<label for="password">Enter New Password</label>
		{!! Form::password('password', array('placeholder' => 'New Password','class' => 'form-control')) !!}
		@if($errors->has('password'))
		<span class="help-block" style="color:#fff">{{ $errors->first('password')}}</span>
		@endif
	</div>
	<div class="form-group {{ $errors->has('confirm_password')? 'has-error':''}}">
		<label for="password">Retype the Password</label>
		{!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
		@if($errors->has('confirm_password'))
		<span class="help-block" style="color:#fff">{{ $errors->first('confirm_password')}}</span>
		@endif
	</div>
	<div class="form-group">
		<input class="btn-login" type="submit" value="Change">
	</div>
	{!! Form::close() !!}
@endsection
