<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'resumes';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'objective',
        'experience',
        'education',
        'skills',
        'languages',
        'hobbies',
        'references',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
//        'experience' => 'array',
//        'education' => 'array',
//        'skills' => 'array',
//        'languages' => 'array',
//        'hobbies' => 'array',
//        'references' => 'array',
    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}
