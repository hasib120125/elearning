{{ Form::open(['id'=>'export-form','route' => 'users.export','method'=>'POST']) }}
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <h4 class="modal-title">Select One</h4>
</div>
<div class="modal-body">
	<div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required">
          <label class="control-label">Group</label>
          <div class="form-line">
            {!! Form::select('group_id', $groups, null, ['class'=>'form-control select2', 'id' =>  'group-id', 'placeholder' => 'Please Select']) !!}                  
          </div>
          <span class="help-block"></span>
        </div>
        <div class="form-group required">
          <label class="control-label">Team</label>
          <div class="form-line">
            {!! Form::select('team_id', $teams, null, ['class'=>'form-control select2', 'id' =>  'team-id', 'placeholder' => 'Please Select']) !!}                  
          </div>
          <span class="help-block"></span>
        </div>
      </div>
    </div>                                 
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
