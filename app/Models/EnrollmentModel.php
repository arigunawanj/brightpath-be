<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnrollmentModel extends Model
{
    use SoftDeletes;

    protected $table = 't_enrollments';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    public function course()
    {
        return $this->belongsTo(CourseModel::class);
    }
}
