<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as RootPermission;

class Permission extends RootPermission
{
    protected $fillable = ['id', 'name', 'display_name', 'category', 'company_id', 'guard_name'];
}
