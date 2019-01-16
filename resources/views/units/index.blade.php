@extends('layouts.dashboard')
@section('page-title', 'Units')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Units
  </h2>
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
    ajax: "{{route('units.data')}}",
    columns: [
      {title: 'Name', data: 'name'},
      {title: 'No. of Users', data: 'qty', searchable: false, orderable: false },
    ]
  })
})
</script>
@endpush
