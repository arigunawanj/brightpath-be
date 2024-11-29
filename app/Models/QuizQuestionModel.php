<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionModel extends Model
{
    use SoftDeletes;

    protected $table = 't_quiz_questions';
    protected $guarded = [];

     // Relasi ke kuis
     public function quiz()
     {
         return $this->belongsTo(QuizModel::class);
     }

     // Relasi ke soal
     public function question()
     {
         return $this->belongsTo(QuestionModel::class);
     }
}
