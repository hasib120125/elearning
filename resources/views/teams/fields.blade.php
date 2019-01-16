<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label" for="name">Name</label>
      </div>
      <div class="col-md-4">
        {!! Form::text('name', null, array('placeholder' => 'Team name','class' => 'form-control')) !!}
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name')}}</span>
          @endif
      </div>
    </div>
  </div>
</div>

<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group required {{ $errors->has('group_id') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label" for="name">Group</label>
      </div>
      <div class="col-md-4">
        {!! Form::select('group_id', $groups, null, ['class' => 'form-control select2', 'placeholder' => 'Please Select'])!!}
        @if($errors->has('group_id'))
          <span class="help-block">{{ $errors->first('group_id')}}</span>
        @endif
      </div>
    </div>
  </div>
</div>

<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group {{ $errors->has('users') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label" for="name">Users</label>
      </div>
      <div class="col-md-10">
        {!! Form::select('users[]', $users, empty($team) ? null : $team->users->pluck('id'), ['class' => 'form-control select2','multiple' => true])!!}
        @if($errors->has('users'))
          <span class="help-block">{{ $errors->first('users')}}</span>
        @endif
      </div>
    </div>
  </div>
</div>
