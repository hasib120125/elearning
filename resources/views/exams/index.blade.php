@extends('layouts.dashboard')
@section('page-title', 'Exams')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Exams
  </h2>
  <div class="pull-right">
    <a href="{{ route('exams.create')}}" class="btn bg-blue create-button" id="create-button">
      <i class="fa fa-plus-square"></i> Add new
    </a>
  </div>
</div>
<div class="content">
  <div class="alert alert-success" id="success-msg" style="display:none"></div>
  <div class="alert alert-error" id="error-msg" style="display:none"></div>
  <div class="panel panel-default">
    <div class="panel-body">
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
<div class="modal" id="modal-form-normal">
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
    ajax: "{{route('exams.data')}}",
    columns: [
      {title: 'Title', data: 'title'},
      {title: 'Type', data: 'type', name: 'type'},
      {title: 'Duration', data: 'duration', searchable: false, orderable: false },
      {title: 'Expiry Date', data: 'expired_at'},
      {title: 'No Of Questions', data: 'no_of_questions', orderable: false, searchable: false},
      {title: 'Score', data: 'score'},
      {title: 'Status', data: 'status', name: 'status.name'},
      {title: 'Action', data: 'action', orderable: false, searchable: false, className: 'action-column'},
    ]
  })
  $("#data-table").on('click', '.assign-button', function (e) {
    e.preventDefault();
    $.get($(this).attr('href'))
    .done(function (data) {
      $("#modal-form-normal .modal-content").html(data);
      $("#modal-form-normal").modal('show');
    });
  })
})
</script>
@endpush
