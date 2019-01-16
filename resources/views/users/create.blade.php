@extends('layouts.dashboard')
@section('page-title', 'Create User')
@section('content')
{!! Form::open(['id'=>'model-form','route' => 'users.store','method'=>'POST']) !!}
<div class="content-header clearfix">
   <h2 class="pull-left">
    ADD A NEW USER
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('users.index' )}}">back to User list</a>
    </small>
  </h2>
  <div class="pull-right">
      <button type="submit" name="save" class="btn bg-blue">
          <i class="fa fa-floppy-o"></i>
          Save
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
                    @include('users.fields')
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@endsection
