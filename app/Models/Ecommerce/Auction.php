<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Ecommerce\AuctionBid;

class Auction extends Model
{
    use HasFactory;

    public const STATUS_READY = 0;
    public const STATUS_SYNCING = 1;
    public const STATUS_STOPED = 2;
    public const STATUS_PENDING = 9;

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
        return $this->hasMany(AuctionCommodity::class, "auction_id", "id");
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

    
}
