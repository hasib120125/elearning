<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label" for="name">Name</label>
      </div>
      <div class="col-md-4">
        {!! Form::text('name', null, array('placeholder' => 'Skill name','class' => 'form-control')) !!}
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name')}}</span>
          @endif
      </div>
    </div>
  </div>
</div>
