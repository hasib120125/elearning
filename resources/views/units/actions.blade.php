<a href="{{route('units.edit',['id'=>$unit->id])}}" class="btn btn-success action-button edit-button">
    <i class="fa fa-edit"></i>
</a>
@if(!$unit->qty)
<a href="{{ route('units.delete', ['id' => $unit->id]) }}"class="btn btn-danger action-button delete-button">
    <i class="fa fa-times"></i>
</a>
@endif
