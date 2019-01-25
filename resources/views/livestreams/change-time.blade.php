{!! Form::open(['id'=>'model-form','route' => ['exams.change-time', $exam_user->id],'method'=>'POST', 'files'=> true, 'data-val'=> true]) !!}
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <h4 class="modal-title">Change Time</h4>
</div>
<div class="modal-body">

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group required {{ $errors->has('started_at') ? 'has-error' : ''}}">
                <div class="col-md-3">
                    <label class="control-label">Start Date</label>
                </div>
                <div class="col-md-9">
                    {!! Form::text('started_at', $exam_user->started_at->format('Y-m-d H:i:s'), array('id' => 'started-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datetimepicker', 'autocomplete' => 'off')) !!}
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group required {{ $errors->has('ended_at') ? 'has-error' : ''}}">
                <div class="col-md-3">
                    <label class="control-label">End Date</label>
                </div>
                <div class="col-md-9">
                    {!! Form::text('ended_at', $exam_user->ended_at->format('Y-m-d H:i:s'), array('id' => 'ended-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datetimepicker', 'autocomplete' => 'off')) !!}
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
{!! Form::close() !!}
