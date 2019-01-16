@extends('layouts.dashboard')
@section('page-title', 'Users')

@section('content')

<div class="content-header clearfix">
  <h2 class="pull-left">
    List of Users
  </h2>
  <div class="pull-right">

    <a href="#" class="btn btn-info btn-sm" id="export-button">
      <i class="fa fa-download"></i> Users Export
    </a>
    <a href="{{ route('users.delete-bulk')}}" class="btn btn-danger btn-sm" id="bulk-create-button">
      <i class="fa fa-times"></i> Delete Bulk
    </a>
    <a href="{{ route('users.create-bulk')}}" class="btn bg-blue action-button" id="bulk-create-button">
      <i class="fa fa-plus-square"></i> Add Bulk
    </a>
    <a href="{{ route('users.edit-bulk')}}" class="btn bg-blue action-button" id="bulk-edit-button">
      <i class="fa fa-edit"></i> Edit Bulk
    </a>
    <a href="{{ route('users.create')}}" class="btn bg-blue create-button" id="create-button">
      <i class="fa fa-plus-square"></i> Add new
    </a>
  </div>
</div>
<div class="content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="bg-gray color-palette" style="padding: 10px; margin-bottom: 10px">
          {{ Form::open(['id'=>'export-form','route' => 'users.export','method'=>'POST']) }}
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Select Group</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('group_ids[]', $groups, null, ['class' => 'group-id form-control select2',  'data-tags' => 'true', 'data-allow-clear' => 'true', 'multiple' => true]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Teams</label>
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('team_ids[]', $teams->pluck('name', 'id'), null, ['class' => 'team-id form-control select2',  'data-tags' => 'true', 'data-allow-clear' => 'true', 'multiple' => true]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-lablel">Status</label>
                        </div>
                        <div class="col-md-8">
                          {!! Form::select('active_id',['1'=>'Active','0'=>'Inactive'], null, ['class' => 'active-id form-control select2',  'data-tags' => 'true', 'data-allow-clear' => 'true']) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
      </div>
      <div class="table-responsive">
        <table id="data-table" class="table table-bordered" style="width:100%"></table>
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
<script src="{{ asset('vendor/DataTables/Buttons-1.5.1/js/buttons.colVis.min.js')}}"></script>
<script>
$(function () {
    var groups = {!! $groups !!}
    var teams = {!! $teams !!}
    var teamIds = [];
    var groupIds = [];
    var active_id = '';
  var table = $('#data-table').DataTable({
    serverSide: true,
    processing: true,
    dom: 'lBfrtip',
    buttons: [
        'colvis'
    ],
    scrollX: true,
    ajax: {
        url: "{{route('users.data')}}",
        data: function(d){
            d.team_ids = teamIds;
            d.group_ids = groupIds;
            d.active_id = active_id;
          }
      },
    columns: [
      {title: 'Login ID', data: 'username'},
      {title: 'Employee ID', data: 'code'},
      {title: 'Name', data: 'name'},
      {title: 'Phone', data: 'phone'},
      {title: 'Email', data: 'email', visible: false},
      {title: 'Type', data: 'type', name: 'roles.display_name'},
      {title: 'Division', data: 'division_name', name: 'division.name'},
      {title: 'Department', data: 'department_name', name: 'department.name', visible: false},
      {title: 'Unit', data: 'unit_name', name: 'unit.name', visible: false},
      {title: 'Teams', data: 'teams', name: 'teams.name'},
      {title: 'Status', data: 'is_active',name:'is_active',
          render: function (val) 
                {
                    if(val == 1)
                    {
                    return "<a href=''><small class='label pull-right bg-green'>Active</small></a>";
                    }
                    else if(val == '0')
                    {
                    return "<a href=''><small class='label pull-right bg-yellow'>Inactive</small></a>";
                    }
                    
                }
      },
      {title: 'Registered At', data: 'registered_at', name:'users.created_at', visible: false},
      {title: 'Actions', data: 'action', orderable: false, searchable: false, className: 'action-column'}
    ]
  })

  $(document).on('change', '.type', function(){
      if($(this).val() === 'admin'){
          $('.role-id').prop('disabled',false);
      }else{
          $('.role-id').val(null).trigger('change');
          $('.role-id').prop('disabled', true);
      }
  })

  $(document).on('change.select2', '.group-id', function(e){
      groupIds = $(this).val();
      var data = []
      var curTeams = []
      teams.forEach(function(team){
          if(groupIds.includes(team.group_id)){
              data.push({
                  id: team.id,
                  text: team.name
              })
          }else if(groupIds.length == 0){
              data.push({
                  id: team.id,
                  text: team.name
              })
          }
      })
      var $team = $('.team-id');
      $team.select2('destroy');
      $team.children().remove();
      $team.select2({
          placeholder: 'Please Select',
          data: data,
          allowClear: true
      })
      $team.trigger('change');
      table.draw(false);
  })

  $(".active-id").change(function(){
        active_id = $(this).val();
        table.draw(false);
    })

  $(document).on('change.select2', '.team-id', function(e){
      teamIds = $(this).val();
      table.draw(false);
  })
  $("#export-button").click(function(e){
      e.preventDefault()
      $("#export-form").submit();
  })
})
</script>
@endpush
