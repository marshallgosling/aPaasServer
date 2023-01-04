<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_VALID = 1;
    public const STATUS_CLOSE = 9;

    protected $table = 'fa_commodity';

    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'currency',
        'status',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(CommodityImage::class, 'commodity_id', 'id')->orderBy('order_no', 'desc');
    }
}
