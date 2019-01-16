<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamUser extends Pivot
{
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'exam_user_question', 'exam_user_id')
            ->withPivot([
                'answer',
            ])
            ->withTimestamps();
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    public function teams()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function extra(){
        return $this->belongsTo('App\Models\ExamUserExtra');
    }
    protected $casts = [
        'state' => 'array',
    ];
    protected $dates = [
        'started_at',
        'ended_at',
        'taken_at',
        'completed_at',
    ];

    /**
     * @return string
     */
    public function getUpdatedAtColumn()
    {
        if ($this->pivotParent) {
            return $this->pivotParent->getUpdatedAtColumn();
        }

        return static::UPDATED_AT;
    }

    public function getCreatedAtColumn()
    {
        if ($this->pivotParent) {
            return $this->pivotParent->getCreatedAtColumn();
        }

        return static::CREATED_AT;
    }
}
