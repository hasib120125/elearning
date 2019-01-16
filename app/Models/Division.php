<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
