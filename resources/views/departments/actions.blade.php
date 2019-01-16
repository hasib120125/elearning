<a href="{{route('departments.edit',['id'=>$department->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$department->qty)
<a href="{{ route('departments.delete', ['id' => $department->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
