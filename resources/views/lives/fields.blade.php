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
    <div class="form-group {{ $errors->has('skills') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label" for="name">Skills</label>
      </div>
      <div class="col-md-10">
        {!! Form::select('skills[]', $skills, empty($team) ? null : $team->skills->pluck('id'), ['class' => 'form-control select2','multiple' => true])!!}
        @if($errors->has('skills'))
          <span class="help-block">{{ $errors->first('skills')}}</span>
        @endif
      </div>
    </div>
  </div>
</div>
