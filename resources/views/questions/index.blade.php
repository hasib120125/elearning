@extends('layouts.dashboard')
@section('page-title', 'Questions')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Questions
  </h2>
  <div class="pull-right">
    <a href="{{route('questions.delete-bulk')}}" class="btn btn-danger action-button">
      <i class="fa fa-download"></i> Delete Bulk
    </a>
    <a href="#" class="btn btn-info action-button" id="export-question">
      <i class="fa fa-download"></i> Export Questions
    </a>
    <a href="{{ route('questions.create-bulk')}}" class="btn bg-blue action-button" id="bulk-create-button">
      <i class="fa fa-plus-square"></i> Add Bulk
    </a>
    <a href="{{ route('questions.edit-bulk')}}" class="btn bg-blue action-button" id="bulk-edit-button">
      <i class="fa fa-edit"></i> Edit Bulk
    </a>
    <a href="{{ route('questions.create')}}" class="btn bg-blue create-button" id="create-button">
      <i class="fa fa-plus-square"></i> Add new
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
          {{ Form::open(['id'=>'export-form','route' => 'questions.export-exam-question','method'=>'POST']) }}
            <div class="row">                
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Category</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('category_id', $categories, null, ['class' => 'category-id form-control select2', 'placeholder' => 'Please select', 'id'=>'export-exam', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Type</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('type',['objective'=>'Objective','descriptive'=>'Descriptive'], null, ['class' => 'type form-control select2', 'placeholder' => 'Please select','data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Status</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('status_id', $statuses, null, ['class' => 'status-id form-control select2', 'placeholder' => 'Please select', 'id'=>'export-exam', 'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
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

    var category_id = '';
    var status_id = '';
    var type = '';

    var table = $('#data-table').DataTable(
    {
      serverSide: true,
      processing: true,
      "order": [[ 3, 'asc' ], [ 0, 'asc' ]],


      ajax:{
       url: "{{route('questions.data')}}",
       data: function(d){
             d.category_id = category_id;
             d.status_id = status_id;
             d.type = type; 
        }
      }, 
      

      columns: [
      {
        title: 'Question',
        data: 'question'
      },
      {
        title: 'Answer',
        data: 'answer'
      },
      {
        title: 'Stat',
        data: 'stat' ,
        orderable: false,
        searchable: false,
        className: 'action-column'
      },
      {
        title: 'Category',
        data: 'category.name'
      },
      {
        title: 'Type',
        data: 'type'
      },
      {
        title: 'Status',
        data: 'status',
        name: 'status.name'
      },
      {
        title: 'Actions',
        data: 'action',
        orderable: false,
        searchable: false,
        className: 'action-column'
      }]
    })

    $(".category-id").change(function(){
        category_id = $(this).val();
        table.draw(false);
    })

    $(".type").change(function(){
        type = $(this).val();
        table.draw(false);
    })

    $(".status-id").change(function(){
        status_id = $(this).val();
        table.draw(false);
    })
  })

  $('#export-question').click(function(e){
    e.preventDefault();
    $('#export-form').submit();
  })
  
</script>

@endpush
