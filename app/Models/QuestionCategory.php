<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];
    protected $appends = ['qty', 'objective_qty', 'descriptive_qty'];

    public function parent()
    {
        return $this->belongsTo('App\Models\QuestionCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\QuestionCategory', 'parent_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'category_id');
    }

    public function getQtyAttribute($type)
    {
        return $this->questions()->count();
    }

    public function getObjectiveQtyAttribute($type)
    {
        return $this->questions()->where('type', 'objective')->where('status_id', 8)->count();
    }

    public function getDescriptiveQtyAttribute($type)
    {
        return $this->questions()->where('type', 'descriptive')->where('status_id', 8)->count();
    }
}
