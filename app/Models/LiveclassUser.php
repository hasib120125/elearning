<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LiveclassUser extends Pivot
{
    public function liveclass()
    {
        return $this->belongsTo('App\Models\Liveclass');
    }

    public function teams()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    protected $casts = [
        'state' => 'array',
    ];
    
    protected $dates = [
        'started_at',
        'ended_at',
        'taken_at',
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
