<?php

namespace App\Models\Ecommerce;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    public const STATUS_READY = 0;
    public const STATUS_VALID = 1;
    public const STATUS_CLOSE = 9;

    public const ROLE_AUDIENCE = 2;
    public const ROLE_HOST = 1;
    
    protected $table = "fa_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_no',
        'password',
        'phone',
        'facebook',
        'twitter',
        'apple',
        'verified',
        'status',
        'role'
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
    ];

    public static function findByMobile($mobile)
    {
        return User::where('phone', $mobile)->first();
    }

    public static function findByUserNo($userNo)
    {
        return User::where('user_no', $userNo)->first();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['demo'];
    }
}
