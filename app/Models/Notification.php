<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    protected $guarded = [
        // 'admin_only_field', // Add attributes that should not be mass-assigned here
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
        // dates is an array of fields that should be cast to dates
    ];

    protected $casts = [
        'title' => 'encrypted', // Cast 'title' attribute to encrypted
        'body' => 'encrypted',
    ];
}
