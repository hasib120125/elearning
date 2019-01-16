@extends('layouts.dashboard')
@section('page-title', 'Create Course')
@section('content') {!! Form::open(['id'=>'model-form','route' => 'courses.store','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="content-header clearfix">
  <h2 class="pull-left">
    ADD A NEW COURSE
    <small>
      <i class="fa fa-arrow-circle-left"></i>
        <a href="{{ route('courses.index' )}}">back to Course list</a>
    </small>
  </h2>
  <div class="pull-right">
    <button type="submit" name="save" class="btn bg-blue submit-button">
          <i class="fa fa-floppy-o"></i>
          Save
      </button>
  </div>
</div>
<div class="content">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">
      Course Info
    </div>
    <div class="panel-body">
      <div class="form-horizontal">
        <div class="row">
          <div class="col-md-12">
            <div class="row clearfix">
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('name') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" for="name">Name</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('name', null, ['placeholder' => 'Course name','class' => 'form-control']) !!}
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('status_id') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" for="name">Status</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::select('status_id', $statuses, null, ['placeholder' => 'Please select', 'class' => 'form-control select2','placeholder' => 'Select Status', 'data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group {{ $errors->has('descritption') ? 'has-error' : ''}}">
                  <div class="col-md-2">
                    <label class="control-label" for="name">Description</label>
                  </div>
                  <div class="col-md-10">
                    {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3, 'placeholder' => 'Write something about the course'])!!}
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group required {{ $errors->has('started_at') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label">Start Date</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('started_at', now()->startOfDay()->format('Y-m-d'), array('id' => 'started-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}

                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group required {{ $errors->has('ended_at') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label">End Date</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::text('ended_at', now()->addMonth()->endOfDay()->format('Y-m-d'), array('id' => 'ended-at', 'placeholder' => '1990-10-10', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}

                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-6">
                <div class="form-group required {{ $errors->has('duration') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label" style="padding-top:27px">Duration</label>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Day</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[0]', 0, ['class' => 'form-control', 'min' => 0])!!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Hour</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[1]', 0, ['class' => 'form-control', 'min' => 0, 'max' => 23])!!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-md-12">
                            <label class="control-label">Minute</label>
                          </div>
                          <div class="col-md-12">
                            {!! Form::number('duration[2]', 0, ['class' => 'form-control', 'min' => 0, 'max' => 59])!!}
                          </div>
                        </div>
                      </div>
                    </div>
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6" style="padding-top:24px">
                <div class="form-group required {{ $errors->has('difficulty_id') ? 'has-error' : ''}}">
                  <div class="col-md-4">
                    <label class="control-label">Difficulty</label>
                  </div>
                  <div class="col-md-8">
                    {!! Form::select('difficulty_id', $difficulties, null, ['class' => 'form-control select2', 'placeholder' =>'Please select'])!!}
                      <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group required {{ $errors->has('skill_ids') ? 'has-error' : ''}}">
                  <div class="col-md-2">
                    <label class="control-label" for="name">Skills</label>
                  </div>
                  <div class="col-md-10">
                    {!! Form::select('skill_ids[]', $skills, null, ['class' => 'form-control select2','multiple' => true])!!}
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-6" style="padding-top:24px">
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label">Exam</label>
                    </div>
                    <div class="col-md-8">
                      {!! Form::select('exam_id', $exams, 'null', ['class' => 'form-control select2', 'placeholder' =>'Please select','data-allow-clear' => 'true', 'data-tags' => 'true'])!!}
                    </div>
                  </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group ">
                  <div class="demo-checkbox col-sm-6 col-sm-offset-2">
                      {!! Form::checkbox('is_top', 1, false, ['id' => "is_top", 'class' => 'form-control filled-in'])!!}
                    <label for="is_top">Show In Topchart</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-md-8">
                <div class="form-group required">
                  <div class="col-md-3">
                    
                  </div>

                  <div class="col-md-9">
                    <div class="demo-checkbox">
                      
                      <input type="checkbox" name="allow_certificate" value="1" id="is_active2">
                      <label for="is_active2">Allow Certificate</label>
                    </div>
                      <span class="help-block"></span>
                  </div>

                </div>
              </div>
            </div>
            <div class="row clearfix" id="options-container" style="display: none">
              <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Threshold Mark </label>
                        </div>
                        <div class="col-md-9">
                            {!! Form::number('threshold_mark', 80, []) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label>First Signer Name </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="text" value="" name="signer_name1" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label>First Signer Position </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="text" name="signer_position1" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label>First Signer Signature </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="file" name="signer_sign1" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label>Second Signer Name </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="text" name="signer_name2" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label>Second Signer Position </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="text" name="signer_position2" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label>Second Signer Signature </label>
                        </div>
                        <div class="col-md-9">
                            <div class="option-line">
                                <input type="file" name="signer_sign2" />
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default" style="margin-bottom: 0">
    <div class="panel-heading clearfix" role="tab" id="headingTwo">
      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
              <a class="collapsed" role="button">
                  Topics
              </a>
          </h4>
      <div class="pull-right">
        <a href="javascript:void(0);" class="btn btn-sm btn-primary add-topic">
                  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp
                  Add Topic
              </a>
      </div>
    </div>
    <div class="panel-body">
      <div class="panel-group topic-group" id="accordion-topic" role="tablist" aria-multiselectable="true">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

<div class="topic-template" style="display:none">
  <div class="panel panel-default panel-topic">
    <div class="panel-heading clearfix" role="tab" id="headingTwo">
      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
              <a class="collapsed accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion-topic" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                  <span class="topic-title">External Lesion</span>
              </a>
              <input name="topic_name[]" class="topic-title-input" style="display:none"/>
              <button class="btn btn-default btn-xs edit-topic-title" role="button" type="button"><i class="fa fa-edit" area-hidden="true"></i></button>
              <button class="btn btn-default btn-xs ok-topic-title" role="button" type="button" style="display:none"><i class="fa fa-check" area-hidden="true"></i></button>
          </h4>
      <div class="pull-right">
        <button class="btn btn-success btn-xs add-content" role="button" type="button"><i class="fa fa-arrow-down" area-hidden="true"></i></button>
        <button class="btn btn-primary btn-xs add-another-topic" role="button" type="button"><i class="fa fa-plus" area-hidden="true"></i></button>
        <button class="btn btn-danger btn-xs remove-topic" role="button" type="button"><i class="fa fa-times" area-hidden="true"></i></button>
      </div>
    </div>

    <div id="collapse-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
      <div class="panel-body">
        <div class="row clearfix">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Topic Description</label>
              <textarea name="topic_description[]" class="form-control" rows="3" placeholder="Topic Description"></textarea>
            </div>
          </div>
        </div>
        <div class="panel-group content-group" id="accordion-content" role="tablist" aria-multiselectable="true">
          <input type="hidden" class="no-of-contents" name="no_of_contents[]" value="0" />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content-template" style="display:none">
  <div class="panel panel-default panel-content">
    <div class="panel-heading clearfix" role="tab" id="1">
      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
          <a class="collapsed accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
              <span class="content-title">External Lesion</span>
          </a>
          <input name="content_title[]" class="content-title-input" style="display:none"/>
          <button class="btn btn-default btn-xs edit-content-title" role="button" type="button"><i class="fa fa-edit" area-hidden="true"></i></button>
          <button class="btn btn-default btn-xs ok-content-title" role="button" type="button" style="display:none"><i class="fa fa-check" area-hidden="true"></i></button>
      </h4>
      <div class="pull-right">
        <button class="btn btn-primary btn-xs add-another-content" role="button" type="button"><i class="fa fa-plus" area-hidden="true"></i></button>
        <button class="btn btn-danger btn-xs remove-content" role="button" type="button"><i class="fa fa-times" area-hidden="true"></i></button>
      </div>
    </div>
    <div id="collapse-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
      <div class="panel-body">
        <div class="row clearfix">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Content Description</label>
              <textarea name="content_description[]" class="form-control" rows="3" placeholder="Content Description"></textarea>
            </div>
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <label class="control-label">File</label>
                <input type="hidden" name="file_id[]" class="file-id">
                <form class="dropzone">
                  {{ csrf_field() }}
                  <div class="dz-message">
                    <div class="col-xs-12">
                      <div class="message">
                        Drop the file here or Click to Upload
                      </div>
                    </div>
                  </div>
                  <div class="fallback">
                    <input type="file" name="file[]">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--Dropzone Preview Template--}}
<div id="preview" style="display: none;">

  <div class="dz-preview dz-file-preview">
    <div class="dz-image"><img data-dz-thumbnail /></div>

    <div class="dz-details">
      <div class="dz-size"><span data-dz-size></span></div>
      <div class="dz-filename"><span data-dz-name></span></div>
    </div>
    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>



    <div class="dz-success-mark">

      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>Check</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                </g>
            </svg>

    </div>
    <div class="dz-error-mark">

      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>error</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                    </g>
                </g>
            </svg>
    </div>
  </div>
</div>
{{--End of Dropzone Preview Template--}}
@endsection
@push('scripts')
<script src="{{ asset('vendor/dropzone/dropzone.js')}}"></script>
<script>
  var topicNo = 1;
  var contentNo = 1;
  $('.add-topic').click(function(e)
  {
    e.preventDefault();
    var topic = $('.topic-template').children('.panel').clone();
    $(topic).find('.accordion-toggle').attr('area-controls', 'topic-' + topicNo);
    $(topic).find('.accordion-toggle').attr('href', '#topic-' + topicNo);
    $(topic).find('.panel-collapse').attr('id', 'topic-' + topicNo);
    $(topic).find('.topic-title').html('Topic No - ' + topicNo);
    $(topic).find('.topic-title-input').val('Topic No - ' + topicNo);
    $(topic).find('.content-group').attr('id', 'accordion-content-' + topicNo);
    $(topic).attr('data-id', topicNo);
    $(topic).appendTo('.topic-group');
    $(topic).find('.add-content').trigger('click');
    $('.content-group').sortable();
    topicNo++;
  })
  $(document).on('click', '.edit-topic-title', function()
  {
    var panelTitle = $(this).closest('.panel-title');
    $(panelTitle).find('.topic-title').hide();
    $(panelTitle).find('.topic-title-input').show().focus();
    $(this).hide();
    $(this).siblings('.ok-topic-title').show();
  })

  $(document).on('click', '.ok-topic-title', function()
  {
    var panelTitle = $(this).closest('.panel-title');
    var topicTitle = $(panelTitle).find('.topic-title-input').val();
    $(panelTitle).find('.topic-title-input').hide()
    if (topicTitle.length == 0 || !topicTitle.trim())
    {
      $(panelTitle).find('.topic-title-input').val($(panelTitle).find('.topic-title').html());
    }
    else
    {
      $(panelTitle).find('.topic-title').html(topicTitle);
    }
    $(panelTitle).find('.topic-title').show();
    $(this).hide();
    $(this).siblings('.edit-topic-title').show();
  })
  $(document).on('keydown', '.topic-title-input', function(e)
  {
    if (e.keyCode == 13)
    {
      e.preventDefault();
      $(this).closest('.panel-title').find('.ok-topic-title').trigger('click');
    }
  })
  $(document).on('blur', '.topic-title-input', function(e)
  {
    e.preventDefault();
    $(this).closest('.panel-title').find('.ok-topic-title').trigger('click');
  })

  $(document).on('click', '.remove-topic', function()
  {
    $(this).closest('.panel').remove();
    if ($('.topic-group').find('.panel').length <= 0)
    {
      topicNo = 1;
      contentNo = 1;
    }
  })
  $(document).on('click', '.add-content', function(e)
  {
    e.preventDefault();
    var content = $('.content-template').children('.panel').clone();
    $(content).find('.accordion-toggle').attr('area-controls', 'content-' + contentNo);
    $(content).find('.accordion-toggle').attr('href', '#content-' + contentNo);
    $(content).find('.panel-collapse').attr('id', 'content-' + contentNo);
    $(content).find('.content-title').html('Content No - ' + contentNo);
    $(content).find('.content-title-input').val('Content No - ' + contentNo);
    var topicId = $(this).closest('.panel-topic').attr('data-id');
    var contGroup = $(this).closest('.panel').find('.content-group');
    $(content).find('.accordion-toggle').attr('data-parent', "#" + $(contGroup).attr('id'));
    $(content).appendTo($(contGroup));
    var accordion = $(this).closest('.panel-heading').find('.accordion-toggle');
    if ($(accordion).hasClass('collapsed'))
    {
      $(accordion).trigger('click');
    }
    var noOfCont = $(contGroup).find('.no-of-contents');
    $(noOfCont).val(parseInt($(noOfCont).val()) + 1);
    $(content).find('.accordion-toggle').trigger('click');
    contentNo++;
    initDropzone($(content).find('.dropzone'));
  })
  $(document).on('click', '.edit-content-title', function()
  {
    var panelTitle = $(this).closest('.panel-title');
    $(panelTitle).find('.content-title').hide();
    $(panelTitle).find('.content-title-input').show().focus();
    $(this).hide();
    $(this).siblings('.ok-content-title').show();
  })

  $(document).on('click', '.ok-content-title', function()
  {
    var panelTitle = $(this).closest('.panel-title');
    var contentTitle = $(panelTitle).find('.content-title-input').val();
    $(panelTitle).find('.content-title-input').hide()
    if (contentTitle.length == 0 || !contentTitle.trim())
    {
      $(panelTitle).find('.content-title-input').val($(panelTitle).find('.content-title').html());
    }
    else
    {
      $(panelTitle).find('.content-title').html(contentTitle);
    }
    $(panelTitle).find('.content-title').show();
    $(this).hide();
    $(this).siblings('.edit-content-title').show();
  })
  $(document).on('keydown', '.content-title-input', function(e)
  {
    if (e.keyCode == 13)
    {
      e.preventDefault();
      $(this).closest('.panel-title').find('.ok-content-title').trigger('click');
    }
  })
  $(document).on('blur', '.content-title-input', function(e)
  {
    e.preventDefault();
    $(this).closest('.panel-title').find('.ok-content-title').trigger('click');
  })
  $(document).on('click', '.remove-content', function()
  {
    var noOfCont = $(this).closest('.content-group').find('.no-of-contents');
    $(noOfCont).val(parseInt($(noOfCont).val()) - 1);
    $(this).closest('.panel').remove();
  })
  $(document).on('click', '.add-another-topic', function()
  {
    $('.add-topic').trigger('click');
  })
  $(document).on('click', '.add-another-content', function()
  {
    $(this).closest('.panel-topic').find('.add-content').trigger('click');
  })
  $('.add-topic').trigger('click');
  $('.topic-group').sortable(
  {
    start: function(e, ui)
    {
      $(document).find('.accordion-toggle').not('.collapsed').trigger('click');
      ui.item.height("54px");
      ui.placeholder.height("54px");
    }
  });
  //my-dropzone
  Dropzone.autoDiscover = false;

  function initDropzone(elem)
  {
    $(elem).dropzone(
    {
      url: "{{ route('content-files.upload')}}",
      method: "post",
      maxFiles: 1,
      uploadMultiple: false,
      maxFilesize: 1000000,
      previewTemplate: document.querySelector('#preview').innerHTML,
      addRemoveLinks: true,
      dictRemoveFile: 'Remove file',
      dictFileTooBig: 'Image is larger than 500MB',
      timeout: 100000,

      success: function(file, response)
      {
        $(elem).siblings('.file-id').val(response);
      }
    })
  }
  function validateForm(form){
  var data = new FormData($(form)[0]);
  data.delete('files[]');
  data.delete('file');
  data.append('validate', true);
  $.post({
    url : $(form).attr('action'),
    data: data,
    processData: false,  // Important!
    contentType: false,
    cache: false,
    success: function(){
      $(form).submit();
    },
    error: function(jqXHR){
      if (jqXHR.status === 422) {
        $('.help-block').html('');
        $('.has-error').removeClass('has-error');
        errors = jqXHR.responseJSON;
        $.each(errors.errors, function (key, value) {
          var group = $("[name=" + key + "]").closest('.form-group');
          if(!group.length){
            group = $("[name='" + key + "[]']").closest('.form-group');
          }
          $(group).addClass("has-error")
          $(group).find('.help-block').html(value[0]);
        });
      } else if(jqXHR.status === 403) {
        var element = document.getElementById('error-msg');
        $("#modal-form").modal('hide');
        element.innerHTML = "You don't have permission to do this";
        element.style.display = "block";
      } else {
        //console.log(jqXHR.responseText)
      }
    }
  });
}
  $('.submit-button').click(function(e){
      e.preventDefault();
      validateForm($('#model-form'));
  });
</script>
<script type="text/javascript">
    $(function () {
        $("#is_active2").click(function () {
            if ($(this).is(":checked")) {
                $("#options-container").show();
            } else {
                $("#options-container").hide();
            }
        });
    });
</script>
  
<script>
  $('#is_active2').on('change', function(){
    this.value = this.checked ? 1 : 0;
  }).change();
</script>
@endpush
@push('styles')
<link href="{{ asset('vendor/dropzone/dropzone.css')}}" rel="stylesheet" />
<style>
  .topic-group .panel-heading {
    background-color: #c3c0c0;
  }

  .content-group .panel-heading {
    color: white;
    background-color: #7f7f7f;
  }

  .content-group .panel-heading input {
    color: black;
  }
</style>

<!-- <script type="text/javascript">
  $('#result').on('change', function() {
  $('#not_show').css('display', 'none');
  if ( $(this).val() === '$exams' ) {
    $('#not_show').css('display', 'block');
  }
});
</script> -->
@endpush
