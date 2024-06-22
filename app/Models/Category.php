<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'category_name',
        'jobCount'
    ];


    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'category_name' => 'encrypted',
    ];

    public function circulars(): HasMany
    {
        return $this->hasMany(Circular::class , 'category_id', 'id');
    }

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class , 'category_id', 'id');
    }

    // Automatically generate slug from name when saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
