<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;

class Liveclass extends Model
{
    use Userstamps;
    protected $fillable = [
        'title',
        'description',
        'duration',
        'created_at',
        'updated_at',
        'status_id',
        'url',
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

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    protected $dates = ['ended_at'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withPivot([
                'id',
                'started_at',
                'ended_at',
                'status_id',
                'taken_at',
                'state',
            ])
            ->withTimestamps()
            ->using('App\Models\LiveclassUser');
    }
}
