<a href="{{route('exams.edit',['id'=>$exam->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$exam->qty)
<a href="{{ route('exams.delete', ['id' => $exam->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
