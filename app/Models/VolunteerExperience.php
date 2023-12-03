<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VolunteerExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'organization',
        'position',
        'start_date',
        'end_date',
        'description',
    ];
}
