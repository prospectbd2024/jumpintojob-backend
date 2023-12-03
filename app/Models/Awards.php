<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Awards extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'award_name',
        'date',
        'description',
    ];
}
