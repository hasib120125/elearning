@extends('layouts.dashboard')
@section('page-title', 'Skills')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Skills
  </h2>
  <div class="pull-right">
    <a href="{{ route('skills.create')}}" class="btn bg-blue create-button" id="create-button">
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
    ajax: "{{route('skills.data')}}",
    columns: [
      {title: 'Name', data: 'name'},
      {title: 'No of Courses', data: 'qty', searchable: false, orderable: false },
      {title: 'Actions', data: 'action', orderable: false, searchable: false}
    ]
  })
})
</script>
@endpush
