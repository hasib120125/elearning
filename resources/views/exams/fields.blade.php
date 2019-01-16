<div class="row">
  <div class="col-md-8">
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('title') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Name</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('title', null, ['placeholder' => 'Exam Title','class' => 'form-control']) !!}
            @if($errors->has('title'))
              <span class="help-block">{{ $errors->first('title')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group required {{ $errors->has('description') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Description</label>
          </div>
          <div class="col-sm-9">
            {!! Form::textarea('description', null, ['placeholder' => 'Exam Description', 'rows' => 3, 'class' => 'form-control']) !!}
            @if($errors->has('description'))
              <span class="help-block">{{ $errors->first('description')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('type') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="category">Type</label>
          </div>
          <div class="col-sm-9">
            <div class="demo-checkbox">
              {!! Form::radio('type', "objective", true, ['id' => 'is_active2', 'class' => 'question-type', 'disabled' => !empty($exam)])!!}
              <label for="is_active2">Objective</label>
              {!! Form::radio('type', "descriptive", false, ['id' => 'is_active1', 'class' => 'question-type', 'disabled' => !empty($exam)])!!}
              <label for="is_active1">Descriptive</label>
            </div>
          </div>
          @if($errors->has('type'))
            <span class="help-block">{{ $errors->first('type')}}</span>
            @endif
        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('status_id') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="">Status</label>
          </div>
          <div class="col-sm-9">
            <div class="demo-checkbox">
              {!! Form::radio('status_id', "1", true, ['id' => 'status_id1', 'class' => 'form-control'])!!}
              <label for="status_id1">Open</label> {!! Form::radio('status_id', "2", false, ['id' => 'status_id2', 'class' => 'form-control'])!!}
              <label for="status_id2">Close</label>
            </div>
          </div>
          @if($errors->has('status_id'))
            <span class="help-block">{{ $errors->first('status_id')}}</span>
            @endif
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('expired_at') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Expiry Date</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('expired_at', empty($exam->expired_at)? null: $exam->expired_at->format('Y-m-d'), array('id' => 'expired_at', 'placeholder' => '1990-10-10', 'class' => 'form-control datepicker')) !!}
            @if($errors->has('expired_at'))
              <span class="help-block">{{ $errors->first('expired_at')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('duration') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Duration</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('duration', null, ['placeholder' => 'In Minutes', 'id' => 'duration','class' => 'form-control']) !!}
            @if($errors->has('duration'))
              <span class="help-block">{{ $errors->first('duration')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('score') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label class="control-label">Score</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('score', null, ['id' => 'score', 'placeholder' => 'Score', 'class' => 'form-control', 'disabled' => !empty($exam)]) !!}
            @if($errors->has('score'))
              <span class="help-block">{{ $errors->first('score')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>
    <div id="three_field">
    <div class="row clearfix" id="allow_dont">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('type') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="category">Allow "Don't Know" Option?</label>
          </div>
          <div class="col-sm-9">
            <div class="demo-checkbox">
              {!! Form::radio('allow_dont_know', '1', false, ['id' => 'is_active3', 'class' => 'question-type'])!!}
              <label for="is_active3">Yes</label>
              {!! Form::radio('allow_dont_know', '0', true, ['id' => 'is_active4', 'class' => 'question-type'])!!}
              <label for="is_active4">No</label>
            </div>
          </div>
          @if($errors->has('type'))
            <span class="help-block">{{ $errors->first('type')}}</span>
            @endif
        </div>
      </div>
    </div>

    <div class="row clearfix" id="allow_negative_mark">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('type') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="category">Allow Negative Marking?</label>
          </div>
          <div class="col-sm-9">
            <div class="demo-checkbox">
              {!! Form::radio('allow_negative_mark', '1', false, ['id' => 'is_active5', 'class' => 'question-type'])!!}
              <label for="is_active5">Yes</label>
              {!! Form::radio('allow_negative_mark', '0', true, ['id' => 'is_active6', 'class' => 'question-type'])!!}
              <label for="is_active6">No</label>
            </div>
          </div>
          @if($errors->has('type'))
            <span class="help-block">{{ $errors->first('type')}}</span>
            @endif
        </div>
      </div>
    </div>

    <div class="row clearfix" id="allow_negative_mark">
      <div class="col-md-12">
        <div class="form-group required {{ $errors->has('type') ? 'has-error' : ''}}">
          <div class="col-sm-3">
            <label for="category">Negative Marking Weight(%)</label>
          </div>
          <div class="col-sm-4">
              {!! Form::text('negative_mark_weight', null, ['id' => 'exam_negative_mark_weight', 'placeholder' => '30', 'class' => 'form-control']) !!}
               
          </div>

          @if($errors->has('type'))
            <span class="help-block">{{ $errors->first('type')}}</span>
            @endif
        </div>
      </div>
    </div>

  </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <div class="form-group {{ $errors->has('allow_result_mail') ? 'has-error' : ''}}">
          <div class="demo-checkbox col-sm-9 col-sm-offset-3">
            {!! Form::checkbox('allow_result_mail', true, empty($exam) ? true: $exam->allow_result_mail == '1', ['id' => 'send-email', 'class' => 'form-control filled-in'])!!}
            <label for="send-email">Email the result</label>
          </div>
          @if($errors->has('allow_result_mail'))
            <span class="help-block">{{ $errors->first('allow_result_mail')}}</span>
            @endif
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="form-group {{ $errors->has('allow_previous') ? 'has-error' : ''}}">
          <div class="demo-checkbox col-sm-9 col-sm-offset-3">
            {!! Form::checkbox('allow_previous', true, empty($exam) ? true: $exam->allow_previous == '1', ['id' => 'allow-previous', 'class' => 'form-control filled-in'])!!}
            <label for="allow-previous">Allow Back Button</label>
            @if($errors->has('allow_previous'))
              <span class="help-block">{{ $errors->first('allow_previous')}}</span>
              @endif
          </div>
        </div>
      </div>
    </div>

    

  </div>
</div>
<div class="row clearfix">
  <div class="col-md-12">
    <div class="box box-default bg-gray disabled">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label">Category</label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label">No of question</label>
              </div>
            </div>
          </div>
        </div>
        @if(empty($exam))
        <div class="row clearfix category-row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-sm-12">
                {!! Form::select('category_ids[]', $categories->pluck('name', 'id'), null, ['class' => 'form-control select2 category-ids', 'placeholder' => 'Select Category'])!!}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::number('no_of_questions[]', null, ['placeholder' => '0', 'class' => 'form-control no-of-questions']) !!}
                  </div>
                  <div class="col-md-6 max-questions">
                    (max <span class="max-no-of-questions">0</span> questions)
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="row clearfix">
          <div class="col-md-6 text-right">
            <strong>Total Number of Questions</strong>
          </div>
          <div class="col-md-6">
            <strong class="total-no-of-questions">0</strong>
          </div>
        </div>
        @else
        @foreach($exam->categories as $exam_cat)
          <div class="row clearfix category-row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="col-sm-12">
                  {!! Form::select('category_ids[]', $categories->pluck('name', 'id')->diff($exam->categories->where('id', '!=', $exam_cat->id)->pluck('name', 'id')), $exam_cat->id, ['class' => 'form-control select2 category-ids', 'placeholder' => 'Select Category', 'data-allow-clear'
                  => 'true', 'data-tags' => 'true', 'disabled' => true])!!}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-md-6">
                      {!! Form::number('no_of_questions[]', $exam_cat->pivot->no_of_questions, ['placeholder' => '0', 'class' => 'form-control no-of-questions', 'disabled' => true]) !!}
                    </div>
                    <div class="col-md-6 max-questions">
                      (max <span class="max-no-of-questions">{{ $exam->type == 'descriptive' ? $exam_cat->descriptive_qty : $exam_cat->objective_qty }}</span> questions)
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          @endforeach
            <div class="row clearfix">
              <div class="col-md-6 text-right">
                <strong>Total Number of Questions</strong>
              </div>
              <div class="col-md-6">
                <strong class="total-no-of-questions">{{ $exam->categories()->sum('no_of_questions') }}</strong>
              </div>
            </div>
            @endif
      </div>
    </div>
  </div>
</div>
<div id="category-row-template" style="display:none">
  <div class="row clearfix category-row">
    <div class="col-md-6">
      <div class="form-group">
        <div class="col-sm-12">
          <select placeholder="Please Select" name="category_ids[]" class="form-control category-ids">
                <option></option>
            </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <input type="number" name="no_of_questions[]" placeholder="0" class="form-control no-of-questions" />
            </div>
            <div class="col-md-6 max-questions">
              (max <span class="max-no-of-questions">0</span> questions)
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</div>
@push('scripts')
<script>
  var categories = {!! $categories !!};

  $(document).on('change.select2', '.category-ids', function(e)
  {
    var categoryId = $(this).val();
    var catRow = $(this).closest('.category-row');
    var category = categories.find(function(category)
    {
      return category.id == categoryId;
    })
    var template = $("#category-row-template").html();
    if (category)
    {
      if ($('.question-type:checked').val() == 'objective')
      {
        $(catRow).find('.max-no-of-questions').html(category.objective_qty);
      }
      else if ($('.question-type:checked').val() == 'descriptive')
      {
        $(catRow).find('.max-no-of-questions').html(category.descriptive_qty);
      }
      $('.no-of-questions').trigger('keyup');
    }
    else
    {
      $(catRow).find('.max-no-of-questions').html('');
      $('.no-of-questions').trigger('keyup');
    }
    var usedCategories = [];
    $('.category-ids').each(function()
    {
      if (!isNaN($(this).val()) && $(this).val())
      {
        var curCat = parseInt($(this).val());
        if (!usedCategories.includes(curCat))
        {
          usedCategories.push(curCat);
        }
      }
    })
    var data = [];
    categories.forEach(function(cat)
    {
      if (!usedCategories.includes(cat.id))
      {
        data.push(
        {
          id: cat.id,
          text: cat.name
        })
      }
    })

    if (data.length)
    {
      if (!$(catRow).next('.category-row').length && categoryId)
      {
        $(catRow).after($(template));
        var select = $(catRow).next('.category-row').find('select');
        $(select).select2(
        {
          placeholder: 'Please Select',
          data: data,
          allowClear: true
        })
        $(select).addClass('select2');

      }
    }
    var curSelect = $(this);
    $('.category-ids.select2').each(function()
    {
      if (!$(this).is(curSelect))
      {
        $(this).select2('destroy');
        $(this).children('option:not(:first):not(:selected)').remove();

        $(this).select2(
        {
          placeholder: 'Please Select',
          data: data,
          allowClear: true
        })
      }
    })
  })
  $(document).on('select2:unselecting', '.category-ids', function(e)
  {
    if ($('.category-ids.select2').length > 1)
    {
      $(this).select2('destroy');
      $(this).closest('.category-row').remove();
      var catRow = $(this).closest('.category-row');
      var template = $("#category-row-template").html();
      var usedCategories = [];
      $('.category-ids').each(function()
      {
        if (!isNaN($(this).val()) && $(this).val())
        {
          var curCat = parseInt($(this).val());
          if (!usedCategories.includes(curCat))
          {
            usedCategories.push(curCat);
          }
        }
      })
      var data = [];
      categories.forEach(function(cat)
      {
        if (!usedCategories.includes(cat.id))
        {
          data.push(
          {
            id: cat.id,
            text: cat.name
          })
        }
      })
      if (data.length)
      {
        if (!$(catRow).next('.category-row').length && $(this).val())
        {
          $(catRow).after($(template));
          var select = $(catRow).next('.category-row').find('select');
          $(select).select2(
          {
            placeholder: 'Please Select',
            data: data,
            allowClear: true
          })
          $(select).addClass('select2');
        }
      }
      var curSelect = $(this);
      $('.category-ids.select2').each(function()
      {
        if (!$(this).is(curSelect))
        {
          $(this).select2('destroy');
          $(this).children('option:not(:first):not(:selected)').remove();

          $(this).select2(
          {
            placeholder: 'Please Select',
            data: data,
            allowClear: true
          })
        }
      })
      $('.no-of-questions').trigger('keyup');
    }
    else
    {
      $(this).val("").trigger('change');
    }
    e.preventDefault();
  });
  $(document).on('keyup', '.no-of-questions', function()
  {
    var maxVal = $(this).closest('.category-row').find('.max-no-of-questions').html();
    if ($(this).val() > maxVal)
    {
      $(this).val(maxVal);
    }
    var sum = 0;
    $('.no-of-questions').each(function()
    {
      if ($(this).val())
      {
        sum += parseInt($(this).val());
      }
    })
    $('.total-no-of-questions').html(sum);
  })
  $(document).on('change', '.question-type', function()
  {
    $('.category-ids.select2').trigger('select2:unselecting');
  })
</script>
<script type="text/javascript">
 $(function () {
        $("#is_active1").click(function () {
            if ($(this).is(":checked")) {
                $("#three_field").hide();
                
            } else {
                $("#three_field").show();
               
            }
        });
    });

  $(function () {
        $("#is_active2").click(function () {
            if ($(this).is(":checked")) {
                $("#three_field").show();
                
            } else {
                $("#three_field").hide();
               
            }
        });
    });

  $(function () {
        $("#is_active2").click(function () {
            if ($(this).is(":checked")) {
                $("#three_field").show();
              
            } else {
                $("#three_field").hide();
                
            }
        });
    });
</script>
@endpush
