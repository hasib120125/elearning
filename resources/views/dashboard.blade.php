@extends('layouts/dashboard')
@section('page-title', 'Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>Admin Dashboard</h2>
        </div>
        <div class="body">
          <div class="row">
              <div class="col-md-12">
                  Hello {{ auth()->user()->name }}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
