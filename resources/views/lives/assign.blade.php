@extends('layouts.dashboard')
@section('page-title', 'Assign Liveclass')
@section('content')
{!! Form::open(['id' => 'model-form','route' => ['courses.liveclass-assign'], 'method'=>'POST']) !!}
<div class="content-header clearfix">
   <h2 class="pull-left">
    ASSIGN LIVECLASS
  </h2>
  <div class="pull-right">
      <button type="submit" name="save" class="btn bg-blue">
          <i class="fa fa-floppy-o"></i>
          Assign
      </button>
  </div>
</div>
<div class="content">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

  <div class="panel panel-default">
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group required {{ $errors->has('live_id') ? 'has-error' : ''}}">
                                <div class="col-md-3">
                                    <label class="control-label">Liveclass</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('live_id', $liveClass, null, ['class' => 'form-control select2', 'placeholder' => 'Select Liveclass', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                                    @if($errors->has('live_id'))
                                    <span class="help-block">{{ $errors->first('live_id')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group required {{ $errors->has('started_at') ? 'has-error' : ''}}">
                                <div class="col-md-3">
                                <label class="control-label">Start Date</label>
                            </div>
                                <div class="col-md-9">
                                    {!! Form::text('started_at', now()->startOfDay()->format('Y-m-d H:i:s'), array('id' => 'started-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datetimepicker', 'autocomplete' => 'off')) !!}
                                    @if($errors->has('started_at'))
                                    <span class="help-block">{{ $errors->first('started_at')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group required {{ $errors->has('ended_at') ? 'has-error' : ''}}">
                                <div class="col-md-3">
                                <label class="control-label">End Date</label>
                            </div>
                                <div class="col-md-9">
                                    {!! Form::text('ended_at', now()->addDay()->endOfDay()->format('Y-m-d H:i:s'), array('id' => 'ended-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datetimepicker', 'autocomplete' => 'off')) !!}
                                    @if($errors->has('ended_at'))
                                    <span class="help-block">{{ $errors->first('ended_at')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label">Division</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('division_id', $divisions->pluck('name', 'id'), null, ['class' => 'form-control select2 division-id', 'placeholder' => 'Select Division', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label">Department</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('department_id', $departments->pluck('name', 'id'), null, ['class' => 'form-control select2 department-id', 'placeholder' => 'Select Department', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label">Unit</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('unit_id', $units->pluck('name', 'id'), null, ['class' => 'form-control select2 unit-id', 'placeholder' => 'Select Unit', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label">Group</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('group_id', $groups->pluck('name', 'id'), null, ['class' => 'form-control select2 group-id', 'placeholder' => 'Select Group', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}              
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label">Team</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('team_id', $teams->pluck('name', 'id'), null, ['class' => 'form-control select2 team-id', 'placeholder' => 'Select Division', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}             
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group {{ $errors->has('user_ids') ? 'has-error' : ''}}">
                                <div class="col-md-3">
                                    <label class="control-label">Users</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('user_ids[]', $users->pluck('name', 'id'), null, ['class' => 'form-control select2 user-ids', 'multiple' => true])!!}
                                    @if($errors->has('user_ids'))
                                    <span class="help-block">{{ $errors->first('user_ids')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('email_body') ? 'has-error' : ''}}">
                                <div class="col-md-2">
                                    <label class="control-label">Email Body</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::textarea('email_body', $email_body, ['class' => 'form-control email-body', 'id' => 'email-body'])!!}
                                    @if($errors->has('email_body'))
                                    <span class="help-block">{{ $errors->first('email_body')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@endsection
@push('scripts')
<script src="{{ asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace('email-body')
</script>

@endpush
