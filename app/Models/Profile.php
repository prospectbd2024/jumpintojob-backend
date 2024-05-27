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

    /**
     * Convert the model's attributes to an array.
     * Wrap MongoDB data within 'data' key
     * @return array
     */
    public function toArray(): array
    {
        $data = parent::toArray();

        return ['data' => $data];
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}
