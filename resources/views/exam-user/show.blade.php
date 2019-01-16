@extends('layouts.dashboard')
@section('page-title', 'Exam Result')
@section('content')
<div class="content-header clearfix">
  <h2 class="pull-left">
    EXAM RESULT
  </h2>
</div>
<div class="content">
  <div class="panel panel-default">
    <div class="panel-body">
      <dl>
        <dt><h4>Examinee Info:</h4></dt>
        <dd>
          <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $exam_user->user->name }}</dd>
            <dt>Login ID</dt>
            <dd>{{ $exam_user->user->username }}</dd>
          </dl>
        </dd>
        <dt><h4>Exam Info:</h4></dt>
        <dd>
          <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $exam_user->exam->title }}</dd>
            <dt>Total Mark</dt>
            <dd>{{ $exam_user->exam->score }}</dd>
          </dl>
        </dd>
        <dt><h4>Result Summary:</h4></dt>
        <dd>
          <dl class="dl-horizontal">
            <dt>Questions Answered</dt>
            <dd>{{
              @@empty($c = $exam_user->state["no_of_questions_answered"]) ? 0 : $c }}</dd>
            <dt>Correct Answers</dt>
            <dd>{{
              @@empty($c = $exam_user->state["no_of_correct_answers"]) ? 0 : $c }}</dd>
            <dt>Wrong Answers</dt>
            <dd>{{
              @@empty($c = $exam_user->state["no_of_wrong_answers"]) ? 0 : $c }}</dd>
            <dt>Score</dt>
            <dd>{{
              @@empty($c = $exam_user->state["score"]) ? 0 : $c }}</dd>
          </dl>
        </dd>
        <dt><h4>Answer Sheet:</h4></dt>
        <dd>
            <div class="box box-widget">

          <?php $questions = $exam_user->exam->questions; ?>
          <?php $user_questions = $exam_user->questions; ?>
          <?php function isWrong($ques, $opt)
{
    if ($ques && $ques->pivot && $ques->pivot->answer && 'null' != $ques->pivot->answer && in_array($opt, json_decode($ques->pivot->answer)) && !in_array($opt, json_decode($ques->answer))) {
        return true;
    }

    return false;
}
          ?>
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          @foreach($questions as $key=>$question)
          <?php $answer = $exam_user->questions->where('id', $question->id)->first(); ?>
          <div class="question" data-ques-id="{{ $question->id}}">
            <dl class="dl-horizontal">
              <dt>Question</dt>
              <dd>{{$question->question}}</dd>
              <dt>{{ $question->type == 'objective' ? 'Options' : 'Answer' }}</dt>
              <dd>
                @if($question->type=='objective')
                  <ul class="nav nav-stacked">
                    @foreach($question->options as $key=>$option)
                      <li class="{{ in_array($option, json_decode($question->answer)) ? 'ans-yes' : ''}} {{ isWrong($answer, $option) ? 'ans-no': ''}}">{{ chr(ord('A') + $key) }}. {{ $option }}</li>
                      @endforeach
                  </ul>
                  @else
                  {{ $question->answer }}
                  @endif
              </dd>
              <dt>User's Answer</dt>
              <dd>
                @if($question->type=='objective')
                  <ul class="nav nav-stacked">
                      @if($answer && $answer->pivot && $answer->pivot->answer && $answer->pivot->answer != "null")
                    @foreach(json_decode($answer->pivot->answer) as $option)
                      <li>{{ $option }}</li>
                      @endforeach
                      @else
                      <li>(Not Answered)</li>
                      @endif
                  </ul>
                @elseif($answer && $answer->pivot)
                {{ $answer->pivot->answer}}
                @endif
              </dd>
            </dl>
          </div>
          @endforeach
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
                <ul class="pagination">
                    <li class="paginate_button previous" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                    @foreach($questions as $key=>$question)
                    <li class="paginate_button" data-ques-id="{{$question->id}}" data-key="{{ $key + 1}}"><a href="#" aria-controls="example2" tabindex="0">{{$key + 1}}</a></li>
                    @endforeach
                    <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                </ul>
            </div>
            <!-- /.box-footer -->
          </div>

        </dd>
      </dl>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function()
  {
    $('.paginate_button[data-key=1]').addClass('active');
    $('.paginate_button.previous').addClass('disabled');
    quesUpdate();

    function quesUpdate()
    {
      var qId = $('.paginate_button.active').attr('data-ques-id')
      if ($('.paginate_button.active').next('.paginate_button:not(.next)').length)
      {
        $('.paginate_button.next').removeClass('disabled');
      }
      else
      {
        $('.paginate_button.next').addClass('disabled');
      }
      if ($('.paginate_button.active').prev('.paginate_button:not(.previous)').length)
      {
        $('.paginate_button.previous').removeClass('disabled');
      }
      else
      {
        $('.paginate_button.previous').addClass('disabled');
      }
      $('.question.active').removeClass('active');
      $('.question[data-ques-id=' + qId + ']').addClass('active')
    }
    $('.paginate_button:not(.previous,.next)').click(function(e)
    {
      e.preventDefault();
      $('.paginate_button.active').removeClass('active')
      $(this).addClass('active')
      quesUpdate()
    })
    $('.paginate_button.next').click(function(e)
    {
      e.preventDefault();
      var key = parseInt($('.paginate_button.active').attr('data-key'));
      var el = $('.paginate_button[data-key=' + (key + 1) + ']');
      if (el.length)
      {
        $(el).trigger('click');
      }
      else if (!$(this).hasClass('disabled'))
      {
        $(this).addClass('disabled');
      }
    })
    $('.paginate_button.previous').click(function(e)
    {
      e.preventDefault();
      var key = parseInt($('.paginate_button.active').attr('data-key'));
      var el = $('.paginate_button[data-key=' + (key - 1) + ']');
      if (el.length)
      {
        console.log(el);
        $(el).trigger('click');
      }
      else if (!$(this).hasClass('disabled'))
      {
        $(this).addClass('disabled');
      }
    })
  })
</script>
@endpush
@push('styles')
<style>
  .question {
    display: none
  }

  .question.active {
    display: block
  }

  .ans-yes {
    color: green;
    font-weight: bold;
  }
  .ans-no {
    color: red;
    font-weight: bold;
  }
  .box-body {
      height: 200px;
  }
</style>
@endpush
