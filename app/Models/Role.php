<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RootRole;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends RootRole
{
    use LogsActivity;
    protected static $logName = 'roles';
    protected static $logFillable = true;
    protected $fillable = ['id', 'name', 'guard_name', 'display_name', 'company_id'];
    protected $appends = ['qty'];

    public function getQtyAttribute()
    {
        return \DB::table('role_user')
            ->where('role_id', '=', $this->id)
            ->count();
    }
}
