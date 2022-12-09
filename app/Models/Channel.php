<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use App\Models\Auction;

class Channel extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 0;
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 2;

    protected $table = 'channel';

    protected $fillable = [
        'id',
        'channelid',
        'owner',
        'appid',
        'status',
        'commands'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        
    ];

    public function start()
    {
        $this->status = Channel::STATUS_ONLINE;     
        $this->save();
        return $this->sync();
       
    }

    public function stop()
    {
        $this->status = Channel::STATUS_OFFLINE;
        $this->save();
        return true;
    }


    public function sync()
    {
        if ($this->status == Channel::STATUS_ONLINE) {
            $auction = Auction::where('channelid', $this->channelid)->orderBy('id', 'desc')->lazy()->toArray();
            $redis = Redis::connection();
            $redis->set("AUCTION_CHANNEL_".$this->channelid, json_encode($auction));
            Log::info("Sync channelid: {$this->channelid} to Redis, Json:".json_encode($auction));
            return true;
        }
        return false;
    }
}
