@extends('layouts.dashboard')
@section('page-title', 'Exam Report')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    Report User Result
  </h2>
  <div class="pull-right">
    <a href="#" class="btn btn-info" id="exports-button">
      <i class="fa fa-download"></i> Export Active / Inactive User
    </a>
    <a href="#" class="btn bg-blue export-button" id="export-button">
      <i class="fa fa-download"></i> Export To Excel
    </a>
  </div>
</div>
<div class="content">
  <div class="alert alert-success" id="success-msg" style="display:none"></div>
  <div class="alert alert-error" id="error-msg" style="display:none"></div>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="bg-gray color-palette" style="padding: 10px; margin-bottom: 10px">
        {{ Form::open(['id'=>'export-form','route' => 'reports.export-user-result','method'=>'POST']) }}
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
              <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <div class="col-md-4">
                  <label class="control-lablel">User ID</label>
                </div>
                <div class="col-md-8">
                  {!! Form::select('user_id', $users, null, ['class' => 'user-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                  @if($errors->has('user_id'))
                    <span class="help-block">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-lablel">Status</label>
                </div>
                <div class="col-md-8">
                  {!! Form::select('status_id',['1'=>'Active','0' => 'Inactive'], null, ['class' => 'status-id form-control select2', 'placeholder' => 'Please select', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                 
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
    var startDate = moment().subtract(29, 'days');
    var endDate = moment();
    var status_id = '';
    var user_id = '';
    var table = $('#data-table').DataTable(
    {
      serverSide: true,
      processing: true,
      order: [[ 8, "desc" ], [10, "asc"], [1, "asc"] ],
      ajax:
      {
        url: "{{route('reports.user-result-data')}}",
        data: function(d)
        {
          d.start_date = startDate ? startDate.format('YYYY-MM-DD HH:mm:ss') : '';
          d.end_date = endDate ? endDate.format('YYYY-MM-DD HH:mm:ss') : '';
          d.status_id = status_id;
          d.user_id = user_id;
        }
      },
      columns: [
      {
        title: 'ID',
        data: 'username',
        name: 'users.username'
      },
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
        title: 'Correct',
        data: 'state',
        render: function(data){
            if(data){
                return data.no_of_correct_answers ? data.no_of_correct_answers : ''
            }
            return ''
        }
      },
      {
        title: 'Incorrect',
        data: 'state',
        render: function(data){
            if(data){
                return data.no_of_wrong ? data.no_of_wrong : ''
            }
            return ''
        }
      },
      {
        title: 'Attempted',
        data: 'state',
        render: function(data){
            if(data){
                return data.no_of_questions_answered ? data.no_of_questions_answered : ''
            }
            return ''
        }
      },
      {
        title: 'Score',
        data: 'state',
        render: function(data){
            if(data){
                return data.score ? data.score : ''
            }
            return ''
        }
      },
      {
        title: 'Socre(%)',
        data: 'state',
        render: function(data){
            if(data){
                return data.scorePercent ? data.scorePercent : ''
            }
            return ''
        }
      },
      {
        title: 'Grade',
        data: 'state',
        render: function(data){
            if(data){
                return data.grade ? data.grade : ''
            }
            return ''
        }
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

    $(".user-id").change(function()
    {
      user_id = $(this).val();
      table.draw(false);
    })

    $(".status-id").change(function()
    {
      status_id = $(this).val();
      table.draw(false);
    })

    $('#export-button').click(function(e)
    {
      console.log(e);
      e.preventDefault();
      $('#export-form').submit();
    })

     $('#exports-button').click(function(e)
    {
      console.log(e);
      e.preventDefault();
      $('#export-form').submit();
    })
  })
</script>
@endpush
