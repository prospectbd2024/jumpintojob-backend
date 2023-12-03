<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchPreference extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'cv_id',
        'preferred_regions',
        'preferred_timezone',
        'category_id',
        'experience_level',
        'preferred_salary_range',
        'authorized_to_work_in_usa',
        'has_employment_work_visa',
        'job_notification_confirmed_at',
    ];

    protected $casts = [
        'job_notification_confirmed_at' => 'datetime',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
