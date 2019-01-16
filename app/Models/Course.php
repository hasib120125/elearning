<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Course extends Model
{
    use Userstamps;
    protected $fillable = [
        'name',
        'description',
        'duration',
        'difficulty_id',
        'exam_id',
        'is_top',
        'started_at',
        'ended_at',
        'status_id',
    ];

    public function getDurationAttribute($value)
    {
        return [
            floor($value / 1440),
            floor(($value % 1440) / 60),
            $value % 60,
        ];
    }

    public function setDurationAttribute($value)
    {
        $this->attributes['duration'] = intval($value[0]) * 1440 + intval($value[1]) * 60 + intval($value[2]);
    }

    public function difficulty()
    {
        return $this->belongsTo('App\Models\Difficulty');
    }

    protected $dates = ['started_at', 'ended_at'];

    public function topics()
    {
        return $this->hasMany('App\Models\Topic')->orderBy('display_order');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Content')->orderBy('display_order');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
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
                'is_favorite',
                'is_admin_assigned',
                'is_self_assigned',
            ])
            ->withTimestamps()
            ->using('App\Models\CourseUser');
    }

    public function course_users()
    {
        return $this->hasMany('App\Models\CourseUser');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    public function extra()
    {
        return $this->hasOne('App\Models\CourseExtra');
        
    }
}
