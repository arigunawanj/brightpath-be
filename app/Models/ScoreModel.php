<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreModel extends Model
{

    use SoftDeletes;

    protected $table = 't_scores';
    protected $guarded = [];

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    // Relasi ke kuis
    public function quiz()
    {
        return $this->belongsTo(QuizModel::class);
    }
}
