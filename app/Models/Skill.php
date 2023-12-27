<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes, hasFactory;

    protected $fillable = [
        'cv_id',
        'skill_name',
        'category_id',
        'proficiency',
    ];

//    public function cvs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Cv::class)
//            ->using(Skill::class)
//            ->withPivot('skill_level');
//    }
}
