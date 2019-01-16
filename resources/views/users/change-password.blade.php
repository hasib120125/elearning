@extends('layouts.dashboard')
@section('page-title', 'Change Password')
@section('content')
<div class="container-fluid">
  <div class="row clearfix">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            Change Password
          </h2>
        </div>
        <div class="body">
          {!! Form::open(array('id'=>'create-form','route' => 'users.change-password','method'=>'POST')) !!}
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group required {{ $errors->has('current_password') ? 'has-error' : ''}}">
                <label class="control-label">Current Password</label>
                <div class="form-line">
                  {!! Form::password('current_password', array('placeholder' => 'Current Password','class' => 'form-control')) !!}
                </div>
                @if($errors->has('current_password'))
                <span class="help-block">{{ $errors->first('current_password')}}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group required {{ $errors->has('password') ? 'has-error' : ''}}">
                <label class="control-label">New Password</label>
                <div class="form-line">
                  {!! Form::password('password', array('placeholder' => 'New Password','class' => 'form-control')) !!}
                </div>
                @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password')}}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group required {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
                <label class="control-label">Confirm Password</label>
                <div class="form-line">
                  {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                @if($errors->has('confirm_password'))
                <span class="help-block">{{ $errors->first('confirm_password')}}</span>
                @endif
              </div>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary m-t-15 waves-effect">Change Password</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
