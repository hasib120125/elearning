<div class="row">
  <div class="col-md-8">
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('question') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Question</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('question', null, array('class' => 'form-control', 'rows' => 2)) !!}
            @if($errors->has('question'))
              <span class="help-block">{{ $errors->first('question')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('category_id') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Category</label>
          </div>
          <div class="col-sm-9">
            {!! Form::select('category_id', $categories, null, array('id' => 'category_id', 'class' => 'form-control select2', 'placeholder' => 'Please Select')) !!}
            @if($errors->has('category_id'))
              <span class="help-block">{{ $errors->first('category_id')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group {{ $errors->has('expired_at') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Expiry Date</label>
          </div>

          <div class="col-sm-9">
            {!! Form::text('expired_at', empty($question->expired_at)? null: $question->expired_at->format('Y-m-d'), array('id' => 'expired_at','class' => 'form-control datepicker')) !!}
            @if($errors->has('expired_at'))
              <span class="help-block">{{ $errors->first('expired_at')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('type') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Question Type</label>
          </div>

          <div class="col-sm-9">
            <div class="demo-checkbox">
              {!! Form::radio('type', "objective", true, ['id' => 'is_active2'])!!}
              <label for="is_active2">Objective</label> {!! Form::radio('type', "descriptive", false, ['id' => 'is_active1'])!!}
              <label for="is_active1">Descriptive</label>
            </div>
            @if($errors->has('type'))
              <span class="help-block">{{ $errors->first('type')}}</span>
              @endif
          </div>

        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="">Status</label>
          </div>
          <div class="col-md-9 demo-checkbox">
            {!! Form::radio('status_id', "8", true, ['id' => 'status_id1', 'class' => 'form-control'])!!}
            <label for="status_id1">Available</label> {!! Form::radio('status_id', "9", false, ['id' => 'status_id2', 'class' => 'form-control'])!!}
            <label for="status_id2">Close</label>
          </div>
          @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name')}}</span>
            @endif
        </div>

      </div>
    </div>

    <div class="row clearfix" id="options-container">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('options') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Options</label>
          </div>
          <div class="col-sm-9">
            @if(!empty(old('options')))
            @foreach(old('options') as $option)
            <div class="option-line">
              <input name="options[]" type="text" value="{{$option}}" class="form-control options" />
            </div>
            @endforeach
            @elseif(!empty($question->options))
              @foreach($question->options as $option)
                <div class="option-line">
                  <input name="options[]" type="text" value="{{ $option }}" class="form-control options" />
                </div>
                @endforeach
                @else
                <div class="option-line">
                  <input name="options[]" type="text" class="form-control options" />
                </div>
                <div class="option-line">
                  <input name="options[]" type="text" class="form-control options" />
                </div>
                @endif
                <div class="row">
                  <div class="col-md-12">
                    <button id="add-more-option"><i class="fa fa-plus"></i> Add More Option</button>
                  </div>
                </div>

                @if($errors->has('options'))
                  <span class="help-block">{{ $errors->first('options')}}</span>
                  @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix" id="answer-container" style="display:none">
      <div class="col-sm-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Answer</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('answer', null, ['id' => 'answer', 'class' => 'form-control']) !!}
            @if($errors->has('name'))
              <span class="help-block">{{ $errors->first('name')}}</span>
              @endif
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  var number = "A".charCodeAt(0);
  var checkedId;
  $('.options').each(function(key, el)
  {
    var index = String.fromCharCode(number++)
    @if(old('right_options'))
    var options = @json(old('right_options'));
    var checked = options.includes(index);
    @else
    var checked = $(this).val() && $("#answer").val() && JSON.parse($("#answer").val()).includes($(this).val());
    @endif
    $(el).before($("<input type='checkbox' name='right_options[]' class='right-option form-control filled-in' id = 'option" + index + "' value = '" + index + "' " + (checked ? "checked ='checked' " : '') + "/>"))
      .before($("<label class='option-label' for='option" + index + "'></label").html(index + ". "));
    if (key >= 2)
    {
      $(el).after('<button class="btn btn-danger option-remove"><i class="fa fa-times"></i></button>');
    }
  })

  $("#add-more-option").click(function(e)
  {
    e.preventDefault();
    var clone = $('.option-line').last().clone();
    var index = String.fromCharCode(number++);
    $(clone).find('.option-label').html(index + ". ");

    if ($("#answer").val() == index)
    {
      $(clone).find('.right-option').attr('id', 'option' + index).prop('checked', true).val(index);
    }
    $(clone).find('.right-option').attr('id', 'option' + index).prop('checked', false).val(index);

    $(clone).find('.option-label').attr('for', 'option' + index);
    $(clone).find('.options').val('');
    if (!$(clone).find('.option-remove').length)
    {
      $(clone).find('.options').after('<button class="btn btn-danger option-remove"><i class="fa fa-times"></i></button>');
    }
    $('.option-line').last().after($(clone));
  })

  function optionsVisibility()
  {
    if ($("input[name=type]:checked").val() == 'objective')
    {
      $("#options-container").show();
      $("#answer-container").hide();
    }
    if ($("input[name=type]:checked").val() == 'descriptive')
    {
      $("#options-container").hide();
      $("#answer-container").show();
    }
  }
  optionsVisibility();
  $("input[name=type]").change(function()
  {
    optionsVisibility();
  })
  $(document).on('click', '.option-remove', function(e)
  {
    e.preventDefault();
    $(this).closest(".option-line").remove();
    number--;
  })
</script>
@endpush
