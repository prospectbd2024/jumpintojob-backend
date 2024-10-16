<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['cv_id', 'job_id', 'forwarding_letter_type', 'forwarding_letter'];

    public function circular()
    {
        return $this->belongsTo(Circular::class, 'job_id', 'id');
    }
}
