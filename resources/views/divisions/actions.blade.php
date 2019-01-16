<a href="{{route('divisions.edit',['id'=>$division->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$division->qty)
<a href="{{ route('divisions.delete', ['id' => $division->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
