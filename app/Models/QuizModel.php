<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizModel extends Model
{
    use SoftDeletes;

    protected $table = 't_quizzes';
    protected $guarded = [];

     // Relasi ke soal-soal yang terkait
     public function questions()
     {
         return $this->belongsToMany(QuestionModel::class, 'quiz_questions');
     }

     // Relasi ke skor
     public function scores()
     {
         return $this->hasMany(ScoreModel::class);
     }
}
