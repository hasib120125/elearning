<div class="row">
  <div class="col-md-6">
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label" for="name">Name</label>
          </div>
          <div class="col-md-8">
            {!! Form::text('name', null, ['placeholder' => 'User name','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1]) !!}
            @if($errors->has('name'))
              <span class="help-block">{{ $errors->first('name')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('username') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Login ID</label>
          </div>
          <div class="col-md-8">
            {!! Form::text('username', null, array('placeholder' => 'Login ID','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1)) !!}
            @if($errors->has('username'))
              <span class="help-block">{{ $errors->first('username')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Email</label>
          </div>
          <div class="col-md-8">
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1)) !!}
            @if($errors->has('email'))
              <span class="help-block">{{ $errors->first('email')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Phone</label>
          </div>
          <div class="col-md-8">
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1)) !!}
            @if($errors->has('phone'))
              <span class="help-block">{{ $errors->first('phone')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('password') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Password</label>
          </div>
          <div class="col-md-8">
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1)) !!}
            @if($errors->has('password'))
              <span class="help-block">{{ $errors->first('password')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Confirm Password</label>
          </div>
          <div class="col-md-8">
            {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control', 'disabled' => !empty($user) && $user->source == 1)) !!}

            @if($errors->has('confirm_password'))
              <span class="help-block">{{ $errors->first('confirm_password')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
          <div class="demo-checkbox col-md-8 col-md-offset-4">
            {!! Form::checkbox('is_active', true, empty($user) ? true : $user->is_active, ['class' => 'filled-in', 'id' => 'is_active']) !!}
            <label for="is_active">Is Active</label>
          </div>
        </div>
        <span class="help-block"></span>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group {{ $errors->has('is_locked') ? 'has-error' : ''}}">
          <div class="demo-checkbox col-md-8 col-md-offset-4">
            {!! Form::checkbox('is_locked', true, empty($user) ? false : $user->is_locked, ['class' => 'filled-in', 'id' => 'is_locked', 'disabled' => !empty($user) && $user->source == 1]) !!}
            <label for="is_locked">Is Locked</label>
          </div>
        </div>
        <span class="help-block"></span>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row clearfix">
      <div class="col-md-12 role-container">
        <div class="form-group {{ $errors->has('division_id') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Division</label>
          </div>
          <div class="col-md-8">
            {!! Form::select('division_id', $divisions, null, ['placeholder' => 'Select Division','class' => 'form-control select2 division-id', 'disabled' => true]) !!}
            @if($errors->has('division_id'))
              <span class="help-block">{{ $errors->first('division_id')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12 role-container">
        <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Department</label>
          </div>
          <div class="col-md-8">
            {!! Form::select('department_id', $departments, null, ['placeholder' => 'Select Division','class' => 'form-control select2 department-id', 'disabled' => true]) !!}
            @if($errors->has('department_id'))
              <span class="help-block">{{ $errors->first('department_id')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12 role-container">
        <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Unit</label>
          </div>
          <div class="col-md-8">
            {!! Form::select('unit_id', $units, null, ['placeholder' => 'Select Division','class' => 'form-control select2 unit-id', 'disabled' => true]) !!}
            @if($errors->has('unit_id'))
              <span class="help-block">{{ $errors->first('unit_id')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12 role-container">
        <div class="form-group required {{ $errors->has('role_id') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Type</label>
          </div>
          <div class="col-md-8">
            {!! Form::select('role_id', $roles, !empty($user) && $user->roles->first() ? $user->roles->first()->id : null, ['placeholder' => 'Select Role','class' => 'form-control select2 role-id']) !!}
            @if($errors->has('role_id'))
              <span class="help-block">{{ $errors->first('role_id')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12 role-container">
        <div class="form-group {{ $errors->has('team_ids') ? 'has-error' : ''}}">
          <div class="col-md-4">
            <label class="control-label">Teams</label>
          </div>
          <div class="col-md-8">
            {!! Form::select('team_ids[]', $teams, !empty($user) ? $user->teams->pluck('id') : null, ['class' => 'form-control select2 team-id', 'multiple' => true]) !!}
            @if($errors->has('team_ids'))
              <span class="help-block">{{ $errors->first('team_ids')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
