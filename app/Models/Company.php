<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'logo',
        'cover_image',
        'location',
        'company_type',
        'slug',
        'is_featured'
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'encrypted',
        'logo' => 'encrypted',
        'cover_image' => 'encrypted',
        'location' => 'encrypted',
        'company_type' => 'encrypted'
    ];

    public function employers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employer::class);
    }

    public function jobs(){
        return $this->hasMany(Circular::class,"company_id","id");
    }
}
