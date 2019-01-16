<a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$role->qty)
<a href="{{ route('roles.delete', ['id' => $role->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
