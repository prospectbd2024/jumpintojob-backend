<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publications extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'title',
        'publisher',
        'date',
        'description',
    ];
}
