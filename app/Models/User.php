<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\api\v1\OTPVerificationController;
use App\Notifications\api\v1\AppEmailVerificationNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_plan_id',
        'user_type',
        'first_name',
        'last_name',
        'position',
        'regions',
        'ip',
        'country',
        'city',
        'state',
        'street',
        'state_name',
        'iso_code',
        'postal_code',
        'zip_code',
        'latitude',
        'longitude',
        'timezone',
        'continent',
        'currency',
        'banned',
        'is_verified',
        'username',
        'email',
        'phone',
        'password',
        'referred_by',
        'verification_code',
        'email_verified_at',
        'new_email_verification_code',
        'device_token',
        'referral_code',
        'avatar'
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

    public function generateVerificationCode(): void
    {
        $this->verification_code = rand(100000, 999999);
        $this->save();
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function cvs(): HasMany
    {
        return $this->hasMany(Cv::class);
    }

    public function userPlan(): BelongsTo
    {
        return $this->belongsTo(UserPlan::class);
    }


    //    public function notifications(): HasMany
    //    {
    //        return $this->hasMany(Notification::class);
    //    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function employer(): HasOne
    {
        return $this->hasOne(Employer::class);
    }


    public function skills(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Skill::class)
            ->withPivot('skill_level', 'is_verified')
            ->withTimestamps();
    }
}
