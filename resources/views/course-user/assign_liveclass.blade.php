@extends('layouts.dashboard')
@section('page-title', 'Assign Live Class')
@section('content')
{!! Form::open(['id' => 'model-form','url' => ['course-user.assign-liveclass-save'], 'method'=>'POST']) !!}
<div class="content-header clearfix">
   <h2 class="pull-left">
    ASSIGN LIVE CLASS
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
                            <div class="form-group required {{ $errors->has('course_id') ? 'has-error' : ''}}">
                                <div class="col-md-3">
                                    <label class="control-label">Course</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::select('course_id', $courses, null, ['class' => 'form-control select2', 'placeholder' => 'Select Course', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                                    @if($errors->has('course_id'))
                                    <span class="help-block">{{ $errors->first('course_id')}}</span>
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
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label">Email Body</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::textarea('email_body', $email_body, ['class' => 'form-control email-body', 'id' => 'email-body'])!!}
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label">Exam Email Body</label>
                                </div>
                                <div class="col-md-9">
                                    {!! Form::textarea('exam_email_body', $exam_email_body, ['class' => 'form-control exam-email-body', 'id' => 'exam-email-body'])!!}
                                    <span class="help-block"></span>
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
var divisions = {!! $divisions !!}
var departments = {!! $departments !!}
var units = {!! $units !!}
var groups = {!! $groups !!}
var teams = {!! $teams !!}
var users = {!! $users !!}

CKEDITOR.replace('email-body')

$(document).on('change.select2', '.division-id', function(e){
    var divisionId = parseInt($(this).val());
    var data = [];
    departments.forEach(function(department){
        if(department.division_id == divisionId){
            data.push({
                id: department.id,
                text: department.name
            })
        }else if(isNaN(divisionId)){
            data.push({
                id: department.id,
                text: department.name
            })
        }
    })
    var $department = $('.department-id');
    $department.select2('destroy');
    $department.children('option:not(:first)').remove();
    $department.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $department.trigger('change');

    data = [];
    units.forEach(function(unit){
        if(unit.division_id == divisionId){
            data.push({
                id: unit.id,
                text: unit.name
            })
        }else if(isNaN(divisionId)){
            data.push({
                id: unit.id,
                text: unit.name
            })
        }
    })
    var $unit = $('.unit-id');
    $unit.select2('destroy');
    $unit.children('option:not(:first)').remove();
    $unit.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $unit.trigger('change');

    data = [];
    users.forEach(function(user){
        if(user.division_id == divisionId){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(divisionId)){
            data.push({
                id: user.id,
                text: user.name
            })
        }
    })
    var $user = $('.user-ids');
    $user.select2('destroy');
    $user.find('option').remove();
    $user.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $user.trigger('change');
})

$(document).on('change.select2', '.department-id', function(e){
    var departmentId = parseInt($(this).val());
    var divisionId = parseInt($('.division-id').val());
    var data = [];
    units.forEach(function(unit){
        if(unit.department_id == departmentId){
            data.push({
                id: unit.id,
                text: unit.name
            })
        }else if(isNaN(departmentId) && isNaN(divisionId)){
            data.push({
                id: unit.id,
                text: unit.name
            })
        }else if(isNaN(departmentId) && unit.division_id == divisionId){
            data.push({
                id: unit.id,
                text: unit.name
            })
        }
    })
    var $unit = $('.unit-id');
    $unit.select2('destroy');
    $unit.children('option:not(:first)').remove();
    $unit.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $unit.trigger('change');

    data = [];
    users.forEach(function(user){
        if(user.department_id == departmentId){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(departmentId) && isNaN(divisionId)){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(departmentId) && user.division_id == divisionId){
            data.push({
                id: user.id,
                text: user.name
            })
        }
    })
    var $user = $('.user-ids');
    $user.select2('destroy');
    $user.find('option').remove();
    $user.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $user.trigger('change');
})
$(document).on('change.select2', '.unit-id', function(e){
    var unitId = parseInt($(this).val());
    var divisionId = parseInt($('.division-id').val());
    var departmentId = parseInt($('.department-id').val());
    if(isNaN(unitId) && isNaN(divisionId) && isNaN(departmentId)){
        $('.team-id').prop('disabled', false);
        $('.group-id').prop('disabled', false);
    }else{
        $('.team-id').prop('disabled', true);
        $('.group-id').prop('disabled', true);
    }
    var data = [];
    users.forEach(function(user){
        if(user.unit_id == unitId){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(unitId) && isNaN(departmentId) && isNaN(divisionId)){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(unitId) && isNaN(departmentId) && user.division_id == divisionId){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(unitId) && isNaN(divisionId) && user.department_id == departmentId){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(isNaN(unitId) && user.department_id == departmentId){
            data.push({
                id: user.id,
                text: user.name
            })

        }
    })
    var $user = $('.user-ids');
    $user.select2('destroy');
    $user.find('option').remove();
    $user.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $user.trigger('change');
})

$(document).on('change.select2', '.group-id', function(e){
    var groupId = $(this).val();
    var group = groups.find(function(group){
        return group.id == groupId;
    })
    var data = []
    var curTeams = []
    teams.forEach(function(team){
        if(team.group_id == groupId){
            curTeams.push(team)
            data.push({
                id: team.id,
                text: team.name
            })
        }else if(groupId == "" || isNaN(groupId)){
            data.push({
                id: team.id,
                text: team.name
            })
        }
    })
    var $team = $('.team-id');
    $team.select2('destroy');
    $team.children('option:not(:first)').remove();
    $team.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $team.trigger('change');
    var userIds = [];
    curTeams.forEach(function(team){
        var userId = team.users.map(function(user){
            return user.id
        })
        userIds = userIds.concat(userId);
    })
    var data = [];
    users.forEach(function(user){
        if(userIds && userIds.includes(user.id)){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(!userIds.length && groupId == ""){
            data.push({
                id: user.id,
                text: user.name
            })
        }
    })
    var $user = $('.user-ids');
    $user.select2('destroy');
    $user.find('option').remove();
    $user.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $user.trigger('change');
    var disabled = false
    if(groupId != "" && !isNaN(groupId)){
        disabled = true
    }
    $('.division-id').prop('disabled', disabled)
    $('.department-id').prop('disabled', disabled)
    $('.unit-id').prop('disabled', disabled)
})


$(document).on('change.select2', '.team-id', function(e){
    var teamId = $(this).val();
    var team = teams.find(function(team){
        return team.id == teamId;
    })
    var userIds = [];
    var groupId = $('.group-id').val();
    if(team){
        userIds = team.users.map(function(user) {
            return user.id;
        });
    }else if(groupId != ""){
        var curTeams = []
        teams.forEach(function(team){
            if(team.group_id == groupId){
                curTeams.push(team)
            }
        })

        curTeams.forEach(function(team){
            var userId = team.users.map(function(user){
                return user.id
            })
            userIds = userIds.concat(userId);
        })
    }
    var data = [];
    users.forEach(function(user){
        if(userIds && userIds.includes(user.id)){
            data.push({
                id: user.id,
                text: user.name
            })
        }else if(!userIds.length && teamId == "" && groupId == ""){
            data.push({
                id: user.id,
                text: user.name
            })
        }
    })
    var $user = $('.user-ids');
    $user.select2('destroy');
    $user.find('option').remove();
    $user.select2({
        placeholder: 'Please Select',
        data: data,
        allowClear: true
    })
    $user.trigger('change');
    var disabled = false
    if(teamId != "" && !isNaN(teamId)){
        disabled = true
    }
    $('.division-id').prop('disabled', disabled)
    $('.department-id').prop('disabled', disabled)
    $('.unit-id').prop('disabled', disabled)
})
</script>

@endpush
