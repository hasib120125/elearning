@extends('layouts.dashboard')
@section('page-title', 'Create Course')
@section('content') {!! Form::model($live,['id'=>'model-form','method' => 'PATCH','route' => ['courses.liveclass-update', $live->id]]) !!}
<div class="content-header clearfix">
  <h2 class="pull-left">
    EDIT LIVECLASS
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('courses.liveclass' )}}">back to Liveclass list</a>
    </small>
  </h2>
  <div class="pull-right">
    <button type="submit" name="save" class="btn bg-blue submit-button">
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
    <div class="panel-heading">
      Liveclass Info
    </div>
    <div class="panel-body">
      <div class="form-horizontal">
        <div class="row">
          <div class="col-md-12">
            <div class="row clearfix">
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" for="title">Title</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('title', $live->title, ['placeholder' => 'Liveclass Title','class' => 'form-control']) !!}
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('status_id') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" for="name">Status</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::select('status_id', $statuses, null, ['placeholder' => 'Please select', 'class' => 'form-control select2','placeholder' => 'Select Status', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group {{ $errors->has('descritption') ? 'has-error' : ''}}">
                  <div class="col-md-2">
                    <label class="control-label" for="name">Description</label>
                  </div>
                  <div class="col-md-10">
                    {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3, 'placeholder' => 'Write something about the course'])!!}
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group required {{ $errors->has('started_at') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label">Start Date</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('started_at', now()->startOfDay()->format('Y-m-d'), array('id' => 'started-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}

                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group required {{ $errors->has('ended_at') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label">End Date</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('ended_at', now()->addMonth()->endOfDay()->format('Y-m-d'), array('id' => 'ended-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}

                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('duration') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" style="padding-top:27px">Duration</label>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Day</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[0]', $live->duration[0], ['class' => 'form-control', 'min' => 0])!!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Hour</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[1]', $live->duration[1], ['class' => 'form-control', 'min' => 0, 'max' => 23])!!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Minute</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[2]', $live->duration[2], ['class' => 'form-control', 'min' => 0, 'max' => 59])!!}
                          </div>
                        </div>
                      </div>
                    </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
                  <div class="col-md-2">
                    <label class="control-label" for="url">URL</label>
                  </div>
                  <div class="col-md-10">
                    {!! Form::text('url', null, ['placeholder' => 'Liveclass url','class' => 'form-control']) !!}
                      <span class="help-block"></span>
                  </div>
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

@push('styles')
<style>
  .topic-group .panel-heading {
    background-color: #c3c0c0;
  }

  .content-group .panel-heading {
    color: white;
    background-color: #7f7f7f;
  }

  .content-group .panel-heading input {
    color: black;
  }
</style>
@endpush
