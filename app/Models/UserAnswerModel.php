<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAnswerModel extends Model
{
    use SoftDeletes;

    protected $table = 't_user_answers';
    protected $guarded = [];

    // Relasi ke soal
    public function question()
    {
        return $this->belongsTo(QuestionModel::class);
    }

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}
