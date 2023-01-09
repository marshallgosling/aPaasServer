<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Bid;

class Auction extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_SYNCING = 1;
    public const STATUS_STOPED = 2;

    protected $table = 'fa_auction';

    protected $fillable = [
        'id',
        'name',
        'room_id',
        'description',
        'owner_id',
        'status'
    ];

    protected $casts = [
        
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function commodity()
    {
        return $this->hasMany(Bid::class);
    }

    public function stop()
    {
        if ($this->status != Auction::STATUS_STOPED) {
            $this->status = Auction::STATUS_STOPED;
            $this->save();
        }
    }

    public function sync($status) {
        
            $this->status = $status;
            $this->save();
        
    }

    public function lastBid()
    {
        return Bid::find($this->last_bid);
    }

    public function processBid($auction_id, $uid, $amount)
    {
        $status = 0;
        $reason = "";
        $bidAction = Bid::create(compact(['auction_id','uid','amount','status']));


        if ($this->status != 1) {
            $bidAction->status = Bid::STATUS_CLOSE;
            $bidAction->save();
            Log::info("bid is closed: {$this->id} {$uid} {$amount}");
            
            return [ "result"=> false, "reason" => "Auction is closed." ];
        }

        $lastbid = $this->lastBid();

        $valid = false;

        if (!$lastbid)
        {
            $valid = true;
            Log::info("Bid: {$this->id} Uid:{$uid} is true");
        }
        else
        {
            if ($lastbid->amount < $amount)// && $lastbid->uid != $uid)
            {
                $valid = true;
                Log::info("Bid: {$this->id} Uid:{$uid} is true. Reason: amount < {$amount}");
            }
            else {
                $reason = 'Your bid amount must greater than '.$lastbid->amount.'.';
            }
        }

        
        if ($valid) {
            $bidAction->status = Bid::STATUS_VALID;
            $bidAction->save();
            $this->last_bid = $bidAction->id;
            $this->last_bid_at = $bidAction->created_at;
            $this->amount = $amount;
            $this->owner = $uid;
            $this->save();
            Log::info("Save last valid bid: {$this->id} {$uid} {$bidAction->created_at} {$amount}");
            return [ "result"=> true, "reason" => "Your bid is accepted" ];
        }
        else {
            $bidAction->status = Bid::STATUS_SORRY;
            $bidAction->save();
            Log::info("Save invalid bid: {$this->id} {$uid} {$amount}");
            return [ "result"=> false, "reason" => "Sorry, your bid is invalid.". $reason ];
        }
        
    }
}
