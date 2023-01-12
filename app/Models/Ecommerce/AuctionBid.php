<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AuctionBid extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_SYNCING = 1;
    public const STATUS_STOPED = 2;

    protected $table = 'fa_auction_bid';

    protected $fillable = [
        'id',
        'user_id',
        'price',
        'commodity_id',
        'auction_id',
        'currency',
        'status'
    ];

    protected $casts = [
        
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'commodity_id', 'id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function processBid($auction_id, $uid, $amount)
    {
        
    }
}
