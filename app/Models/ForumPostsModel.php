<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumPostsModel extends Model
{
    use SoftDeletes;

    protected $table = 't_forum_posts';
    protected $guarded = [];

    public function forum()
    {
        return $this->belongsTo(ForumsModel::class);
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

     // Relasi ke parent post
     public function parent()
     {
         return $this->belongsTo(ForumPostsModel::class, 'parent_id');
     }

     // Relasi ke child posts
     public function replies()
     {
         return $this->hasMany(ForumPostsModel::class, 'parent_id');
     }
}
