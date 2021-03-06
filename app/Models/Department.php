<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
}
