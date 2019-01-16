<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class PasswordHistory extends Model
{
    use Userstamps;
    protected $fillable = ['user_id', 'password'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
