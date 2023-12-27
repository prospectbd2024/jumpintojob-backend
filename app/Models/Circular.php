<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Circular extends Model
{
    use SoftDeletes, HasFactory, Sluggable;

    protected $table = 'circulars'; // Table name if different from model name

    protected $fillable = [
        'employer_id',
        'category_id',
        'title',
        'description',
        'availability',
        'slug',
        'current_company_name',
        'location',
        'location_type',
        'vacancies',
        'employment_type',
        'salary',
        'deadline',
        'created_at',
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
//        'title' => 'encrypted', // Cast 'title' attribute to encrypted
//        'description' => 'encrypted',
//        'current_company_name' => 'encrypted',
//        'location' => 'encrypted',
//        'location_type' => 'encrypted',
//        'vacancies' => 'encrypted',
//        'employment_type' => 'encrypted',
//        'salary' => 'encrypted',
//        'experience_level' => 'encrypted',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title'], // Generate slug from 'title' and 'id' attributes
                'onUpdate' => true,          // Regenerate slug when the title is updated
            ],
        ];
    }

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
