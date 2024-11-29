<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModulesModel extends Model
{
    use SoftDeletes;

    protected $table = 't_modules';
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(CourseModel::class);
    }

    public function lessons()
    {
        return $this->hasMany(LessonsModel::class);
    }
}
