<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumsModel extends Model
{
    use SoftDeletes;
    protected $table = 't_forums';
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(CourseModel::class);
    }

    public function posts()
    {
        return $this->hasMany(ForumPostsModel::class);
    }
}
