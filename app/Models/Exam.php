<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class Exam extends Model
{
    use Userstamps;
    use LogsActivity;
    protected static $logName = 'exams';
    protected static $logFillable = true;
    protected $fillable = [
      'id',
      'title',
      'description',
      'type',
      'duration',
      'score',
      'total_no_of_questions',
      'description',
      'allow_previous',
      'allow_result_mail',
      'allow_dont_know',
      'allow_negative_mark',
      'negative_mark_weight',
      'status_id',
      'expired_at',
      'created_at',
      'updated_at',
    ];

    protected $dates = ['expired_at'];

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\QuestionCategory')
            ->withPivot('no_of_questions')
            ->withTimeStamps();
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withPivot([
                'id',
                'started_at',
                'ended_at',
                'status_id',
                'taken_at',
                'completed_at',
                'state',
            ])
            ->withTimestamps()
            ->using('App\Models\ExamUser');
    }
}
