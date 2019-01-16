<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'description',
        'display_order',
        'course_id',
        'topic_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }

    public function file()
    {
        return $this->hasOne('App\Models\ContentFile');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withPivot([
                'id',
                'status_id',
                'completed_at',
            ])
            ->withTimestamps()
            ->using('App\Models\ContentUser');
    }
}
