<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    use HasFactory;

    public const STATUS_INCART = 0;
    public const STATUS_UNPAID = 1;
    public const STATUS_PAID = 2;
    public const STATUS_FINISHED = 3;
    public const STATUS_CANCELED = 4;
    public const STATUS_REFUND = 5;
    public const STATUS_PAID_ERROR = 6;

    protected $table = 'fa_order';

    protected $fillable = [
        'id',
        'order_no',
        'total_price',
        'user_id',
        'auction_id',
        'address_id',
        'total_price',
        'currency',
        'status'
    ];

    protected $casts = [
        
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function commodity()
    {
        return $this->hasMany(OrderCommodity::class, "order_id", "id");
    }
    
}
