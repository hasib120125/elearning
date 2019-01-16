<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamUser;
use App\Models\Setting;
use App\Mail\ExamComplete;
use Mail;

class ExamUserController
{
    public function submit(Request $request, $id)
    {
        if (session('isExamStarted'.$id)) {
            session()->forget('exam'.$id);
            session()->forget('isExamStarted'.$id);
            session()->forget('examStartTime'.$id);
            session()->forget('curQuesNo'.$id);
            session()->forget('exam_user_id'.$id);
        }
        $exam_user = ExamUser::find($id);
        $user = $exam_user->user;
        $exam = $exam_user->exam;
        $answers = [];
        $answered_questions = [];
        $no_of_correct_answers = 0;
        $no_of_wrong_answers = 0;
        foreach ($request->answers as $question_id => $answer) {
            if (!empty($answer)) {
                $question = Question::find($question_id);
                $stat = $question->stat;
                ++$stat['appeared'];
                if ('descriptive' == $exam->type && $question->answer == $answer) {
                    ++$no_of_correct_answers;
                } elseif ('objective' == $exam->type) {
                    $right_options = json_decode($question->answer);
                    if (empty(array_diff($right_options, $answer)) && empty(array_diff($answer, $right_options))) {
                        ++$no_of_correct_answers;
                        ++$stat['correct'];
                    } elseif (in_array("I Don't Know", $answer)) {
                        ++$stat['unknown'];
                    } else {
                        ++$no_of_wrong_answers;
                        ++$stat['incorrect'];
                    }
                    $answered_questions[] = $question_id;
                }
                $question->stat = $stat;
                $question->save();
                $answers[$question_id] = [
                    'answer' => 'objective' == $exam->type ? json_encode($answer) : $answer,
                ];
            }
        }
        foreach ($exam->questions->whereNotIn('questions.id', $answered_questions) as $question) {
            $stat = $question->stat;
            ++$stat['unanswered'];
            $question->stat = $stat;
            $question->save();
        }
        $no_of_questions = $exam->total_no_of_questions;
        if ($exam->allow_negative_mark) {
            $per_question_mark = $exam->score / $no_of_questions;

            $per_question_negative_mark = $per_question_mark * $exam->negative_mark_weight / 100;

            $score = round($per_question_mark * $no_of_correct_answers - $per_question_negative_mark * $no_of_wrong_answers, 2);
        } else {
            $score = round($exam->score / $no_of_questions * $no_of_correct_answers, 2);
        }

        $exam_user->completed_at = Carbon::now();

        $exam_user->state = [
            'time_spent' => $exam_user->completed_at->diffInSeconds($exam_user->taken_at),
            'no_of_questions_answered' => count($request->answers),

            'score' => $score,
            'no_of_correct_answers' => $no_of_correct_answers,
            'no_of_wrong_answers' => $no_of_wrong_answers,
            'scorePercent' => round(100 / $exam->score * $score),
            'grade' => $this->calculateGrade($score / $exam->score),
        ];

        $exam_user->status_id = 5;
        $exam_user->save();
        $exam_user->questions()->sync(
            $answers
        );
        Mail::send(new ExamComplete($exam_user));
    }

    private function calculateGrade($score)
    {
        $score = round($score * 100);
        $competency = Setting::where('key', 'competency')->first();
        $levels = json_decode($competency->value);
        foreach ($levels as $level) {
            if ($score >= $level->min && $score <= $level->max) {
                return $level->label;
            }
        }

        return null;
    }

}
