<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'employers'; // Table name if different from model name

    protected $fillable = [
        'company_id',
        'user_id',
        'name',
        'email',
        'phone',
        'position',
        'avatar'
        // Add other attributes that can be mass-assigned here
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
        'name' => 'encrypted',
        'email' => 'encrypted',
        'phone' => 'encrypted',
        'position' => 'encrypted',
        'avatar' => 'encrypted'
    ];

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function circulars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Circular::class);
    }
}
