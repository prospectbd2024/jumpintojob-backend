<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'cv_id',
        'project_name',
        'start_date',
        'end_date',
        'description',
    ];
}
