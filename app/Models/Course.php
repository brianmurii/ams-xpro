<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'year',
        'credits',
        'group',
        'semester',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function course_users()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function course_marks()
    {
        return $this->hasMany(CourseMark::class);
    }
}
