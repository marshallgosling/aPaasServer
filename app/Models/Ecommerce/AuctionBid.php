<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AuctionBid extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 0;
    public const STATUS_VALID = 1;
    public const STATUS_SORRY = 2;
    public const STATUS_CLOSED = 9;

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

}
