<?php

namespace App\Models\Ecommerce;

use App\Models\Address\ChinaArea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // public const STATUS_READY = 0;
    // public const STATUS_SYNCING = 1;
    // public const STATUS_STOPED = 2;

    protected $table = 'fa_address';

    protected $fillable = [
        'id',
        'name',
        'province_id',
        'city_id',
        'district_id',
        'user_id',
        'country',
        'post_code',
        'contactor',
        'address'
    ];

    protected $casts = [
        
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(ChinaArea::class, 'province_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(ChinaArea::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(ChinaArea::class, 'district_id', 'id');
    }

    public static function getByAccount($user_id)
    {
        return self::with(["user:id,user_no,email"])
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->limit(15)
            ->get();
    }
}
