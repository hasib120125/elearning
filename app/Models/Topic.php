<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'description',
        'course_id',
        'display_order',
    ];

    public function contents()
    {
        return $this->hasMany('App\Models\Content')->orderBy('display_order');
    }
}
