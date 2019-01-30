<a href="{{route('courses.liveclass-edit',['id'=>$liveclass->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
<a href="{{ route('courses.liveclass-delete', ['id' => $liveclass->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
