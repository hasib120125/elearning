@extends('layouts.dashboard')
@section('page-title', 'Liveclass')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Liveclass
  </h2>
  <div class="pull-right">
      <a href="{{ route('courses.liveclass-create')}}" class="btn bg-blue create-button" id="create-button">
          <i class="fa fa-plus-square"></i> Add new
      </a>
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
$(function () {
  $('#data-table').DataTable({
    serverSide: true,
    processing: true,
    ajax: "{{route('courses.liveclass-data')}}",
    columns: [
      {title: 'Title', data: 'title', name:'liveclasses.title'},
      {title: 'Description', data: 'description'},
      {title: 'Start Date', data: 'started_at'},
      {title: 'End Date', data: 'ended_at'},
      {title: 'Status', data: 'status'},
      {title: 'Duration', data: 'duration', render: function(val){
          return val[0] + 'h ' + val[1] + 'm ' + val[2] + 's';
      }},
      {title: 'Actions', data: 'action', orderable: false, searchable: false, className: "action-column"}
    ]
  })
})
</script>
@endpush
