<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
