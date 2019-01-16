<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'group_id'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withTimeStamps();
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
