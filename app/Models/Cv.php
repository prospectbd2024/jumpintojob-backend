<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'cvs';

    protected $fillable = [
        'user_id',
        'template_id',
        'cv_link',
        'title',
        'summary',
    ];

    protected $with = [
        'user'
    ];


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Template::class);
    }
}
