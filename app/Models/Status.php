<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['id', 'name', 'display_name', 'display_order', 'whose'];
    public $timestamps = false;
}
