<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'profiles';

    protected $fillable = [
        'user_id',
        'personal_information',
        'educations',
        'experiences',
        'skills',
        'languages',
        'hobbies',
        'others',
    ];

    protected $casts = [

    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}
