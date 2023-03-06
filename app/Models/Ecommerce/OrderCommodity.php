<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCommodity extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_SYNCING = 1;
    public const STATUS_STOPED = 2;

    public const TYPE_BID = 1;
    public const TYPE_ORDER = 2;

    protected $table = 'fa_order_commodity';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'order_id',
        'commodity_id',
        'commodity',
        'amount',
        'price'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        'commodity' => 'json'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function originCommodity()
    {
        return $this->belongsTo(Commodity::class, 'commodity_id', 'id');
    }

}
