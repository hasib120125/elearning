<div class="row clearfix">
  <div class="col-sm-6">
    <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
      <div class="col-md-2">
        <label class="control-label">Name</label>
      </div>
      <div class="col-md-10">
        {!! Form::text('name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name')}}</span>
          @endif
      </div>
    </div>
  </div>
</div>
<div class="row clearfix">
  <div class="col-sm-6">
    <div class="form-group">
      <div class="col-md-2">
          <label class="control-label">Parent</label>
      </div>
      <div class="col-md-10">
        {!! Form::select('parent_id', $categories, null, array('id' => 'parent_id', 'class' => 'form-control select2', 'placeholder' => 'Please Select')) !!}
        @if($errors->has('parent_id'))
          <span class="help-block">{{ $errors->first('parent_id')}}</span>
          @endif
      </div>
    </div>
  </div>
</div>
