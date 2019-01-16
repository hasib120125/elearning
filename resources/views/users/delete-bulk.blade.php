@extends('layouts.dashboard')
@section('page-title', 'Delete Bulk User')
@section('content')
{!! Form::open(array('route' => 'users.destroy-bulk','method'=>'POST', 'files'=>true)) !!}
<div class="content-header clearfix">
  <h2 class="pull-left">
    DELETE BULK USERS
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('users.index' )}}">back to User list</a>
    </small>
  </h2>
  <div class="pull-right">
    <button type="submit" name="save" class="btn bg-blue">
          <i class="fa fa-floppy-o"></i>
          Import
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
      <div class="box box-default">
        <div class="box-body">
          <div class="callout callout-info">
            <h4>Warning!</h4>
            <h5>You must follow the template for delete bulk user id</h5>

            <p>please <a href="{{ route('template-files.download', 'bulk-user-delete-template.xlsx' )}}">Click here</a> to download the template</p>
          </div>
        </div>
        @if($errors->count())
        <div class="box box-default">
          <div class="box-body">
            <div class="callout callout-danger">
              <h4>
                  <strong>Whoops!</strong> There were some problems with your source file.
            </h4>
              <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
        @endif
        <div class="form-horizontal">
          <div class="row clearfix">
            <div class="col-sm-8">
              <div class="form-group required">
                  <div class="col-md-2">
                <label class="control-label">File</label>
            </div>
                <div class="col-md-8">
                  {!! Form::file('file', ['accept' => '.xlsx', 'id'=>'file', 'class' => 'file-upload-single']) !!}
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