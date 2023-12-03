<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    use SoftDeletes, hasFactory;

    protected $fillable = [
        'cv_id',
        'skill_name',
        'category_id',
        'proficiency',
    ];
}
