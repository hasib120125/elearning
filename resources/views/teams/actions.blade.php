<a href="{{route('teams.edit',['id'=>$team->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$team->qty)
<a href="{{ route('teams.delete', ['id' => $team->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
