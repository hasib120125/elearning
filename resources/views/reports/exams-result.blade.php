@extends('layouts.dashboard')
@section('page-title', 'Exam Report')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    Exam Result
  </h2>
  <div class="pull-right">
      <a href="{{route('reports.export-incomplete-exam-result')}}" class="btn btn-info export-button">
        <i class="fa fa-download"></i> Export Incomplete Exam Results
      </a>
      <a href="{{route('reports.export-exam-result')}}" class="btn bg-blue export-button" >
        <i class="fa fa-download"></i> Export Completed Exam Results
      </a>     
  </div>
</div>
<div class="content">
  <div class="alert alert-success" id="success-msg" style="display:none"></div>
  <div class="alert alert-error" id="error-msg" style="display:none"></div>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="bg-gray color-palette" style="padding: 10px; margin-bottom: 10px">
        <div class="form-horizontal">
          {{ Form::open(['id'=>'export-form','route' => 'reports.export-exam-result','method'=>'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="daterange">Date Range </label>
                        </div>
                        <div class="col-md-8">
                            <div id="reportrange" class="form-control">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Exams</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('exam_id', $exams, null, ['class' => 'exam-id form-control select2', 'placeholder' => 'Please select', 'id'=>'export-exam', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Group</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('group_id', $groups, null, ['class' => 'group-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Team</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('team_id', $teams->pluck('name','id'), null, ['class' => 'team-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-md-4">
                          <label class="control-label">Division</label>
                      </div>
                      <div class="col-md-8">
                          {!! Form::select('division_id', $divisions->pluck('name', 'id'), null, ['class' => 'form-control select2 division-id', 'placeholder' => 'Select Division', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                          <span class="help-block"></span>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label">Department</label>
                      </div>
                      <div class="col-md-8">
                      {!! Form::select('department_id', $departments->pluck('name', 'id'), null, ['class' => 'form-control select2 department-id', 'placeholder' => 'Select Department', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                      <span class="help-block"></span>
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label">Unit</label>
                      </div>
                    <div class="col-md-8">
                      {!! Form::select('unit_id', $units->pluck('name', 'id'), null, ['class' => 'form-control select2 unit-id', 'placeholder' => 'Select Unit', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label">Status</label>
                      </div>
                    <div class="col-md-8">
                      {!! Form::select('status_id',$statuses, null, ['class' => 'form-control select2 status-id', 'placeholder' => 'Select Unit', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
      </div>
      <div class="table-responsive">
        <table id="data-table" class="table table-bordered"></table>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal-form">
  <div class="modal-dialog">
    <div class="modal-content"></div>
  </div>
</div>


@endsection

@push('scripts')
<script>
  $(function()
  {
    var teams = {!!$teams!!};
    var departments = {!!$departments!!};
    var units = {!!$units!!};
    var units = {!!$statuses!!};
    var startDate = moment().subtract(29, 'days');
    var endDate = moment();

    var exam_id = '';
    var group_id = '';
    var team_id = '';
    var division_id = '';
    var department_id = '';
    var unit_id = '';
    var status_id = '';
    var table = $('#data-table').DataTable(
    {
      serverSide: true,
      processing: true,
      order: [[ 3, "desc" ], [5, "asc"], [1, "asc"] ],
      ajax: {
       url : "{{route('reports.exam-result-data')}}",
       data: function(d){
            d.start_date = startDate ? startDate.format('YYYY-MM-DD HH:mm:ss'): '';
            d.end_date = endDate ? endDate.format('YYYY-MM-DD HH:mm:ss') : '';
            d.group_id = group_id;
            d.team_id = team_id;
            d.exam_id = exam_id;
            d.division_id = division_id;
            d.department_id = department_id;
            d.unit_id = unit_id;
            d.status_id = status_id;
          }
      },
      columns: [
      {
        title: 'Title',
        data: 'exam_title',
        name: 'exams.title',
        render: function(data, type, row){
            if(row.status_id == 5){
                return '<a href="/exam-user/'+ row.id + '" target="_blank">' + data + '</a>';
            }
            return data;
        }
      },
      {
        title: 'Name',
        data: 'user_name',
        name: 'users.name'
      },
      {
        title: 'ID',
        data: 'username',
        name: 'users.username'
      },
      {
        title: 'Start Date',
        data: 'started_at',
        name: 'exam_user.started_at'
      },
      {
        title: 'End Date',
        data: 'ended_at',
        name: 'exam_user.ended_at'
      },
      {
        title: 'Status',
        data: 'status',
        name: 'statuses.name'
      },
      ]
    })

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end)
    {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker(
    {
      startDate: start,
      endDate: end,
      ranges:
      {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      locale:
      {
        cancelLabel: 'Clear'
      }
    }, cb);

    cb(start, end);
    $("#reportrange").on('apply.daterangepicker', function(e, picker)
    {
      startDate = picker.startDate;
      endDate = picker.endDate;
      table.draw(false);
    })
    $('#reportrange').on('cancel.daterangepicker', function(ev, picker)
    {
      //do something, like clearing an input
      startDate = undefined;
      endDate = undefined;
      $('#reportrange span').html('');
      table.draw(false);
    });

    $(".exam-id").change(function(){
        exam_id = $(this).val();
        table.draw(false);
    })

    $(".group-id").change(function(){
        group_id = $(this).val();
        var data = []
        teams.forEach(function(team){
          if(team.group_id == group_id){
            data.push({
                id: team.id,
                text: team.name
            })
          }else if(group_id == "" || isNaN(group_id)){
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
      table.draw(false);
    })

    $(".team-id").change(function(){
        team_id = $(this).val();
        table.draw(false);
    })

    $(".division-id").change(function(){
        division_id = $(this).val();
        table.draw(false);
    })

    $(".department-id").change(function(){
        department_id = $(this).val();
        table.draw(false);
    })

    $(".unit-id").change(function(){
        unit_id = $(this).val();
        table.draw(false);
    })

    $(".status-id").change(function(){
        status_id = $(this).val();
        table.draw(false);
    })

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

  $('.export-button').click(function(e){
    e.preventDefault();
    $('#export-form').attr('action', $(this).attr('href'));
    $('#export-form').submit();

  })


</script>
@endpush
