<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interests extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'interest_name',
    ];
}
