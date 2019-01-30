<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasRoles;
    use Userstamps;
    use Notifiable;
    use LogsActivity;
    use HasApiTokens;
    protected static $logName = 'users';
    protected static $logFillable = true;
    protected static $ignoreChangedAttributes = ['remember_token'];
    protected $dates = ['registered_at'];
    protected $guard_name = 'admin';
    protected $fillable = [
      'id',
      'name',
      'email',
      'phone',
      'username',
      'designation',
      'code',
      'password',
      'source',
      'is_default_password',
      'division_id',
      'department_id',
      'unit_id',
      'is_active',
      'is_locked',
      'created_at',
      'token',
    ];
    protected $hidden = ['password', 'token', 'created_at', 'updted_at'];

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team');
    }

    public function passwordHistories()
    {
        return $this->hasMany('App\Models\PasswordHistory');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam')
            ->withPivot([
                'id',
                'status_id',
                'state',
                'started_at',
                'ended_at',
                'taken_at',
                'completed_at',
            ])
            ->withTimestamps()
            ->using('App\Models\ExamUser');
    }

    public function lives()
    {
        return $this->belongsToMany('App\Models\Liveclass')
            ->withPivot([
                'id',
                'status_id',
            ])
            ->withTimestamps()
            ->using('App\Models\LiveclassUser');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course')
            ->withPivot([
                'id',
                'status_id',
                'state',
                'started_at',
                'ended_at',
                'taken_at',
                'completed_at',
                'is_favorite',
                'is_admin_assigned',
                'is_self_assigned',
            ])
            ->withTimestamps()
            ->using('App\Models\CourseUser');
    }

    public function contents()
    {
        return $this->belongsToMany('App\Models\Content')
            ->withPivot([
                'id',
                'status_id',
                'completed_at',
            ])
            ->withTimestamps()
            ->using('App\Models\ContentUser');
    }
}
