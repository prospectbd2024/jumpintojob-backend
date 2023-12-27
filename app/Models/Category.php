<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'category_name',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
//        'category_name' => 'encrypted',
    ];

    public function circulars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Circular::class);
    }
}
