{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id], 'id' => 'model-form', 'style'=>'display:inline']) !!}
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <h4 class="modal-title">Delete Role</h4>
</div>
<div class="modal-body">
  Are you sure you want to delete <i>{{ $role->display_name }}</i> ?
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-danger">Delete</button>
</div>
{!! Form::close() !!}
