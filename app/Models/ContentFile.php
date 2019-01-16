<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentFile extends Model
{
    protected $fillable = [
        'name',
        'raw_name',
        'extension',
        'type',
        'content_id',
        'created_at',
        'updated_at',
        'display_order',
        'file_size',
    ];
}
