<a href="{{route('question-categories.edit',['id'=>$category->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$category->children()->count() && !$category->questions()->count())
<a href="{{ route('question-categories.delete', ['id' => $category->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
