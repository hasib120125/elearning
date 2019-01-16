<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseUser extends Pivot
{
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function courseExtras()
    {
        return $this->belongsTo('App\Models\CourseExtra');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
