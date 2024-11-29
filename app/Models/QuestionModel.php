<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionModel extends Model
{
    use SoftDeletes;

    protected $table = 't_questions';
    protected $guarded = [];

     // Relasi ke pilihan jawaban
     public function options()
     {
         return $this->hasMany(QuestionOptionModel::class);
     }

     // Relasi ke jawaban pengguna
     public function userAnswers()
     {
         return $this->hasMany(UserAnswerModel::class);
     }
}
