<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certifications extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cv_id',
        'certification_name',
        'authority',
        'license_number',
        'start_date',
        'end_date',
        'description',
    ];
}
