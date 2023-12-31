<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CV extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'cvs';

    protected $fillable = [
        'user_id',
        'cv_link',
        'title',
        'summary',
    ];

    protected $with = [
        'educations', 'user'
    ];

    public function educations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Education::class, 'cv_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
