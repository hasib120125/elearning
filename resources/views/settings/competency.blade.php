{!! Form::open(['class'=>'model-form','method' => 'POST','route' => ['settings.competency']]) !!}
<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-md-6">
              Competency
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
     @if($errors->has('competency'))
     <div class="alert alert-danger">
         <ul>
         @foreach($errors->get('competency') as $error)
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
                <div class="col-md-5">
                  <label class="control-label" for="name">Label</label>
                </div>
                <div class="col-md-3">
                  <label class="control-label" for="name">Lower Point</label>
                </div>
                <div class="col-md-3">
                  <label class="control-label" for="name">Higher Point</label>
                </div>
                <div class="col-md-1">
                </div>
              </div>
            </div>
          </div>
          @if(old('labels'))
          @foreach(old('labels') as $key => $label)
          <div class="row clearfix level-row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-md-5">
                  {!! Form::text('labels[]', null, array('placeholder' => 'Label','class' => 'form-control labels')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('mins[]', null, array('placeholder' => '0','class' => 'form-control mins')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('maxes[]', null, array('placeholder' => '100','class' => 'form-control maxes')) !!}
                </div>
                <div class="col-md-1">
                  <button class="btn btn-danger remove-btn" type="button"><i class="fa fa-minus"></i></button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @elseif(count($competencies))
          @foreach($competencies as $competency)
          <div class="row clearfix level-row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-md-5">
                  {!! Form::text('labels[]', $competency->label, array('placeholder' => 'Label','class' => 'form-control labels')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('mins[]', $competency->min, array('placeholder' => '0','class' => 'form-control mins')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('maxes[]', $competency->max, array('placeholder' => '100','class' => 'form-control maxes')) !!}
                </div>
                <div class="col-md-1">
                  <button class="btn btn-danger remove-btn" type="button"><i class="fa fa-minus"></i></button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="row clearfix level-row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-md-5">
                  {!! Form::text('labels[]', null, array('placeholder' => 'Label','class' => 'form-control labels')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('mins[]', null, array('placeholder' => '0','class' => 'form-control mins')) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('maxes[]', null, array('placeholder' => '100','class' => 'form-control maxes')) !!}
                </div>
                <div class="col-md-1">
                  <button class="btn btn-danger remove-btn" type="button"><i class="fa fa-minus"></i></button>
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="row">
              <div class="col-md-12">
                  <button id="add-more-option" type="button"><i class="fa fa-plus"></i> Add More Level</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@push('scripts')
<script>
  $("#add-more-option").click(function()
  {
      var newRow = $('.level-row:last').clone();
      $(newRow).find('.labels, .mins, .maxes').val('');
      $('.level-row:last').after($(newRow))
  })
  $(document).on('click', ".remove-btn", function()
  {
    if ($('.level-row').length > 1)
    {
      $(this).closest('.level-row').remove();
    }
  })
</script>
@endpush
