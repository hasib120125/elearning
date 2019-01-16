<a href="{{route('exams.change-time',['id'=>$exam_user->id])}}" class="btn btn-success edit-button in-modal">
    <i class="fa fa-edit"></i>
</a>
{!! Form::open(['method' => 'POST','route' => ['exams.change-status', $exam_user->id],'style'=>'display:inline']) !!}
<button type="submit" class="btn btn-danger delete-button">
    <i class="fa fa-ban"></i>
</button>
{!! Form::close() !!}
