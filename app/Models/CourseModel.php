<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseModel extends Model
{
    use SoftDeletes;

    protected $table = 'm_courses';
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(UserModel::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(EnrollmentModel::class);
    }

    public function modules()
    {
        return $this->hasMany(ModulesModel::class);
    }

    public function assignments()
    {
        return $this->hasMany(AssignmentModel::class);
    }

    public function forums()
    {
        return $this->hasMany(ForumsModel::class);
    }

}


