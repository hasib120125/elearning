<a href="{{route('groups.edit',['id'=>$group->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$group->qty)
<a href="{{ route('groups.delete', ['id' => $group->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
