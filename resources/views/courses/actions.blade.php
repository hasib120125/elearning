<a href="{{route('courses.edit',['id'=>$course->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$course->qty)
<a href="{{ route('courses.delete', ['id' => $course->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
