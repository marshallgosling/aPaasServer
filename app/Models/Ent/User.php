<?php

namespace App\Models\Ent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'sex',
        'userNo',
        'mobile',
        'status',
        'headUrl'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function findByMobile($mobile)
    {
        return User::where('mobile', $mobile)->first();
    }

    public static function findByUserNo($userNo)
    {
        return User::where('userNo', $userNo)->first();
    }

    
}
