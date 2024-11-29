<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignmentModel extends Model
{
    use SoftDeletes;

    protected $table = 't_assignments';
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(CourseModel::class);
    }

    public function submissions()
    {
        return $this->hasMany(SubmissionModel::class);
    }


}
