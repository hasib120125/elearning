@extends('layouts.dashboard')
@section('page-title', 'Create Question')
@section('content')
{!! Form::open(['id'=>'model-form','route' => 'questions.store','method'=>'POST']) !!}
<div class="content-header clearfix">
   <h2 class="pull-left">
    ADD A NEW QUESTION
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('questions.index' )}}">back to Question list</a>
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
                    @include('questions.fields')
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@endsection
