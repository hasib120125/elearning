<a href="{{route('questions.edit',['id'=>$question->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$question->qty)
<a href="{{ route('questions.delete', ['id' => $question->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
