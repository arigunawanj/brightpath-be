<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradesModel extends Model
{
    use SoftDeletes;

    protected $table = 't_grades';
    protected $guarded = [];

    public function submission()
    {
        return $this->belongsTo(SubmissionModel::class);
    }

    public function student()
    {
        return $this->belongsTo(UserModel::class, 'student_id');
    }
}
