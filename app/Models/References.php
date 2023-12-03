<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class References extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'name',
        'position',
        'company',
        'email',
        'phone',
    ];
}
