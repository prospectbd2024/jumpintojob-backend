<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'cv_id',
        'institution',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'description',
        'undergraduate',
    ];

    public function cv(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cv::class, 'id','cv_id');
    }
}
