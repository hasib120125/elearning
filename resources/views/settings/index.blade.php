@extends('layouts/dashboard')
@section('page-title', 'Settings')
@section('content')
<div class="content-header clearfix">
  <h2 class="pull-left">
    SETTINGS
  </h2>
  <div class="pull-right">

  </div>
</div>
<div class="content">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @include('settings.competency')
  @include('settings.exam-assign-email')
  @include('settings.exam-complete-email')
  @include('settings.course-assign-email')
  @include('settings.course-complete-email')
  @include('settings.quiz-description')
  @include('settings.follow-description')
</div>
@endsection
