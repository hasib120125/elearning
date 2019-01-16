<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = ['name'];

    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }
}
