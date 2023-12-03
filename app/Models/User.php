<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\OTPVerificationController;
use App\Notifications\api\v1\AppEmailVerificationNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_plan_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'referred_by',
        'user_type',
        'verification_code',
        'email_verified_at',
        'new_email_verification_code',
        'device_token',
        'referral_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $with = ['profile', 'searchPreference', 'cvs', 'userPlan', 'addresses', 'contacts'];

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function addresses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function contacts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function searchPreference(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SearchPreference::class);
    }

    public function cvs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CV::class);
    }

    public function userPlan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserPlan::class);
    }

    public function employer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employer::class);
    }

    // Inside your User model or a related service

    public function generateVerificationCode(): void
    {
        $this->verification_code = rand(100000, 999999);
        $this->save();
    }
}
