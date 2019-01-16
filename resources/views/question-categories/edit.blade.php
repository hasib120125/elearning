@extends('layouts.dashboard')
@section('page-title', 'Update Question Category')
@section('content')
{!! Form::model($category, ['id'=>'model-form','method' => 'PATCH','route' => ['question-categories.update', $category->id]]) !!}
<div class="content-header clearfix">
  <h2 class="pull-left">
    UPDATE QUESTION CATEGORY
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('question-categories.index' )}}">back to Question Category list</a>
    </small>
  </h2>
  <div class="pull-right">
    <button type="submit" name="save" class="btn bg-blue">
          <i class="fa fa-floppy-o"></i>
          Update
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
            @include('question-categories.fields')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
