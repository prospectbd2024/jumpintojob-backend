<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes, HasFactory;

    protected $casts = [
        'avatar' => 'string',
    ];

    protected $fillable = [
        'avatar',
        'user_id',
        'category_id',
        'country',
        'state',
        'street',
        'city',
        'postal_code',
        'banned',
        'ip',
        'iso_code',
        'country',
        'city',
        'state',
        'zip_code',
        'postal_code',
        'lat',
        'lon',
        'timezone',
        'currency',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
