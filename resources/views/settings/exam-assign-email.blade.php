{!! Form::open(['class'=>'model-form','method' => 'POST','route' => ['settings.exam-assign-email']]) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-6">
        Default Exam Assignment Email Body
      </div>
      <div class="col-md-6">
        <div class="pull-right">
          <button type="submit" name="save" class="btn bg-blue">
                      <i class="fa fa-floppy-o"></i>
                      Save
                  </button>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-body">
    @if($errors->has('exam_assign_email'))
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->get('exam_assign_email') as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
      </div>
      @endif
      <div class="form-horizontal">
        <div class="row">
          <div class="col-md-12">
            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group">
                  <div class="col-md-12">
                    {!! Form::textarea('exam_assign_email', $exam_assign_email, array('placeholder' => 'Write Something','class' => 'form-control exam-assign-email', 'id' => 'exam-assign-email')) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
{!! Form::close() !!}
@push('scripts')
<script src="{{ asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace('exam-assign-email')
</script>
@endpush
