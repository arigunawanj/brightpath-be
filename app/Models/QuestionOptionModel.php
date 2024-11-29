<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOptionModel extends Model
{
    use SoftDeletes;

    protected $table = 't_question_options';
    protected $guarded = [];

    // Relasi ke soal
    public function question()
    {
        return $this->belongsTo(QuestionModel::class);
    }
}
