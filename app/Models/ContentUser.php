<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContentUser extends Pivot
{
    public function content()
    {
        return $this->belongsTo('App\Models\Content');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected $dates = [
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
