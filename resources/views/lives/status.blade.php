@extends('layouts.dashboard')
@section('page-title', 'Course User Status')
@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    Assigned Course Status
  </h2>
  <div class="pull-right">
    <a href="" class="btn btn-info export-button" id="export-button">
      <i class="fa fa-download"></i> Course Export
    </a>
    
  </div>
</div>
<div class="content">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
  <div class="alert alert-success" id="success-msg" style="display:none"></div>
  <div class="alert alert-error" id="error-msg" style="display:none"></div>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="bg-gray color-palette" style="padding: 10px; margin-bottom: 10px">
          {{ Form::open(['id'=>'export-form','route' => 'course-user.export','method'=>'POST']) }}
        <div class="form-horizontal">
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
                            <label class="control-lablel">Status</label>
                        </div>
                        <div class="col-md-8">
                            {{ Form::select('status_id', $statuses, null, ['class' => 'status-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-lablel">Course Name</label>
                        </div>
                        <div class="col-md-4">
                            {{ Form::select('course_id', $courses, null, ['class' => 'course-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) }}
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content"></div>
  </div>
</div>


@endsection

@push('scripts')
<script>
  $(function()
  {
    var startDate = moment().subtract(29, 'days');
    var endDate = moment();
    var course_id = '';
    var status_id = '';
    var table = $('#data-table').DataTable(
    {
      serverSide: true,
      processing: true,
      order: [[ 3, "desc" ], [5, "asc"], [1, "asc"] ],
      ajax: {
       url : "{{route('course-user.status-data')}}",
       data: function(d){
            d.start_date = startDate ? startDate.format('YYYY-MM-DD HH:mm:ss'): '';
            d.end_date = endDate ? endDate.format('YYYY-MM-DD HH:mm:ss') : '';
            d.course_id = course_id;
            d.status_id = status_id;
          }
      },
      columns: [
      {
        title: 'Course Name',
        data: 'course_name',
        name: 'courses.name',
        render: function(data, type, row){
            if(row.status_id == 5){
                return '<a href="/course-user/'+ row.id + '" target="_blank">' + data + '</a>';
            }
            return data;
        }
      },
      {
        title: 'Student Name',
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
        name: 'course_user.started_at'
      },
      {
        title: 'End Date',
        data: 'ended_at',
        name: 'course_user.ended_at'
      },
      {
        title: 'Status',
        data: 'status',
        name: 'statuses.name'
      },
      {
        data: 'status_id',
        name: 'course_user.status_id',
        visible: false,
        searchable: false
      },
      {
        title: 'Action',
        data: 'action',
        orderable: false,
        searchable: false,
        className: 'action-column'
      }, ]
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
    $(".course-id").change(function(){
        course_id = $(this).val();
        table.draw(false);
    })
    $(".status-id").change(function(){
        status_id = $(this).val();
        table.draw(false);
    })
    $("#export-button").click(function(e){
        e.preventDefault()
        $("#export-form").submit();
    })
  })
</script>
@endpush
