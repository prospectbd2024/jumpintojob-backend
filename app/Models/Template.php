<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'view_path',
        'type',
        'template_type',
    ];


 
}

