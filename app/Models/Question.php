<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class Question extends Model
{
    use Userstamps;
    use LogsActivity;
    protected static $logName = 'questions';
    protected static $logFillable = true;
    protected $fillable = [
        'id',
        'question',
        'answer',
        'type',
        'options',
        'stat',
        'status_id',
        'category_id',
        'expired_at',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['expired_at'];
    protected $casts = [
        'options' => 'array',
        'stat' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\QuestionCategory');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam');
    }
}
