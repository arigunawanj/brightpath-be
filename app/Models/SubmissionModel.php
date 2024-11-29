<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmissionModel extends Model
{
    use SoftDeletes;

    protected $table = 't_submissions';
    protected $guarded = [];

    public function assignment()
    {
        return $this->belongsTo(AssignmentModel::class);
    }

    public function student()
    {
        return $this->belongsTo(UserModel::class, 'student_id');
    }

    public function grade()
    {
        return $this->hasOne(GradesModel::class);
    }
}
