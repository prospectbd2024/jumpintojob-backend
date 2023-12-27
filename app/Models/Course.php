<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'cv_id',
        'course_name',
        'institution',
        'completion_date',
        'description',
    ];
}
