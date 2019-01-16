<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Setting;

class FinishExam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $exam_user;

    /**
     * Create a new job instance.
     */
    public function __construct($exam_user)
    {
        $this->exam_user = $exam_user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $exam_user = $this->exam_user;
        if (4 == $exam_user->status_id) {
            $exam = $exam_user->exam;
            $no_of_questions_answered = 0;
            $answered_questions = [];
            $no_of_correct_answers = 0;
            foreach ($exam_user->questions as $question) {
                $stat = $question->stat;
                $answer = 'descriptive' == $exam->type ? $question->pivot->answer : json_decode($question->pivot->answer);
                ++$no_of_questions_answered;
                ++$stat['appeared'];
                if ('descriptive' == $exam->type && $question->pivot->answer == $answer) {
                    ++$no_of_correct_answers;
                } elseif ('objective' == $exam->type) {
                    $right_options = json_decode($question->answer);
                    if (!empty($answer)) {
                        if (empty(array_diff($right_options, $answer)) && empty(array_diff($answer, $right_options))) {
                            ++$no_of_correct_answers;
                            ++$stat['correct'];
                        } elseif (in_array("I Don't Know", $answer)) {
                            ++$stat['unknown'];
                        } else {
                            ++$stat['incorrect'];
                        }
                        $answered_questions[] = $question->id;
                    }
                }
                $question->stat = $stat;
                $question->save();
            }
            foreach ($exam->questions->whereNotIn('questions.id', $answered_questions) as $question) {
                $stat = $question->stat;
                ++$stat['unanswered'];
                $question->stat = $stat;
                $question->save();
            }
            $exam_user->completed_at = empty($exam_user->state['current_time']) ? now() : $exam_user->state['current_time'];
            $no_of_questions = $exam->total_no_of_questions;
            $exam_user->state = [
                'time_spent' => $exam_user->completed_at->diffInSeconds($exam_user->taken_at),
                'no_of_questions_answered' => $no_of_questions_answered,
                'score' => round($exam->score / $no_of_questions * $no_of_correct_answers),
                'no_of_correct_answers' => $no_of_correct_answers,
                'no_of_wrong_answers' => $no_of_questions_answered - $no_of_correct_answers,
                'scorePercent' => round(100 / $no_of_questions * $no_of_correct_answers),
                'grade' => $this->calculateGrade($no_of_correct_answers / $no_of_questions),
            ];
            $exam_user->status_id = 5;
            $exam_user->save();
        }
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
