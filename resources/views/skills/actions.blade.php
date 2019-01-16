<a href="{{route('skills.edit',['id'=>$skill->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$skill->qty)
<a href="{{ route('skills.delete', ['id' => $skill->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
