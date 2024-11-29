<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable, SoftDeletes;

     protected $table = 'm_users';
     protected $guarded = [];

     protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function coursesAsTeacher()
    {
        return $this->hasMany(CourseModel::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(EnrollmentModel::class);
    }

    public function submissions()
    {
        return $this->hasMany(SubmissionModel::class, 'student_id');
    }

    public function gradedSubmissions()
    {
        return $this->hasMany(GradesModel::class, 'student_id');
    }

    public function forumPosts()
    {
        return $this->hasMany(ForumPostsModel::class);
    }
}
