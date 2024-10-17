<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['cv_id', 'job_id', 'forwarding_letter_type', 'forwarding_letter'];

    protected $casts = [
        'submitted_at' => 'datetime',
        'interview_time' => 'datetime',
    ];

    public function circular(): BelongsTo
    {
        return $this->belongsTo(Circular::class, 'job_id', 'id');
    }
}
