<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group required">
      <label class="control-label">Name</label>
      <div class="form-line">
        {!! Form::text('display_name', null, array('placeholder' => 'Role name','class' => 'form-control')) !!}
      </div>
      <span class="help-block"></span>
    </div>
  </div>
</div>
<div class="row clearfix">
  <div class="col-sm-12">
    <div class="form-group">
      <label class="control-label">Permissions</label>
      <div class="form-line">
        {!! Form::select('permissions[]', $permissions, empty($role) ? null : $role->permissions->pluck('id'), ['class' => 'form-control select2', 'multiple' => true]) !!}
      </div>
      <span class="help-block"></span>
    </div>
  </div>
</div>
