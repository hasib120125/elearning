{!! Form::open(['class'=>'model-form','method' => 'POST','route' => ['settings.course-complete-email']]) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-6">
        Default Course Completion Email Body
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
    @if($errors->has('course_complete_email'))
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->get('course_complete_email') as $error)
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
                    {!! Form::textarea('course_complete_email', $course_complete_email, array('placeholder' => 'Write Something','class' => 'form-control course-complete-email', 'id' => 'course-complete-email')) !!}
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
CKEDITOR.replace('course-complete-email')
</script>
@endpush
