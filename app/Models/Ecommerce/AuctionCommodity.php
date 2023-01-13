<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AuctionCommodity extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_SYNCING = 1;
    public const STATUS_STOPED = 2;

    public const TYPE_BID = 1;
    public const TYPE_ORDER = 2;

    protected $table = 'fa_auction_commodity';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'auction_id',
        'commodity_id',
        'amount',
        'floor_price',
        'ceiling_price',
        'price_step',
        'max_for_person'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id', 'id');
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'commodity_id', 'id');
    }

    public function lastBid()
    {
        return AuctionBid::where('auction_id', $this->auction_id)
            ->where('commodity_id', $this->commodity_id)
            ->where('status', AuctionBid::STATUS_VALID)
            ->orderBy('id', 'desc')->first();
    }

    public function findByID($auction_id, $commodity_id)
    {
        return AuctionCommodity::where('auction_id', $auction_id)
        ->where('commodity_id', $commodity_id)
        ->first();
    }

    public function processBid($user_id, $price, $currency='$')
    {
        $status = 0;
        $reason = "";
        $auction_id = $this->auction_id;
        $commodity_id = $this->commodity_id;

        $bidAction = AuctionBid::create(compact(['auction_id','commodity_id','user_id','price','currency']));


        if ($this->auction->status != Auction::STATUS_SYNCING) {
            $bidAction->status = AuctionBid::STATUS_CLOSED;
            $bidAction->save();
            Log::channel("auction")->info("bid is closed: {$this->id} {$user_id} {$commodity_id} {$price}");
            
            return [ "result"=> false, "reason" => "Auction is closed." ];
        }

        $lastbid = $this->lastBid();

        $valid = false;

        if (!$lastbid)
        {
            $valid = true;
            $p = $this->floor_price + $this->price_step;

            if ($p <= $price)// && $lastbid->uid != $uid)
            {
                $valid = true;
                Log::channel("auction")->info("Bid: {$this->id} Uid:{$user_id} is true. Reason: price {$price} >= {$this->floor_price} + {$this->price_step}");
            }
            else {
                $reason = 'Your bid amount must greater than '.$p.'.';
            }
        }
        else
        {
            $p = $lastbid->price + $this->price_step;
            if ($p <= $price)// && $lastbid->uid != $uid)
            {
                $valid = true;
                Log::channel("auction")->info("Bid: {$this->id} Uid:{$user_id} is true. Reason: price {$price} >= {$lastbid->price} + {$this->price_step}");
            }
            else {
                $reason = 'Your bid amount must greater than '.$p.'.';
            }
        }
        
        if ($valid) {
            $bidAction->status = AuctionBid::STATUS_VALID;
            $bidAction->save();
            // $this->last_bid = $bidAction->id;
            // $this->last_bid_at = $bidAction->created_at;
            // $this->amount = $amount;
            // $this->owner = $uid;
            // $this->save();
            Log::channel("auction")->info("Save last valid bid: {$this->id} {$user_id} {$bidAction->created_at} {$price}");
            return [ "result"=> true, "reason" => "Your bid is accepted" ];
        }
        else {
            $bidAction->status = AuctionBid::STATUS_SORRY;
            $bidAction->save();
            Log::channel("auction")->info("Save invalid bid: {$this->id} {$user_id} {$price}");
            return [ "result"=> false, "reason" => "Sorry, your bid is invalid.". $reason ];
        }
        
    }
    
}
