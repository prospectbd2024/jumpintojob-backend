<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'cv_id',
        'position',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
    ];
}
