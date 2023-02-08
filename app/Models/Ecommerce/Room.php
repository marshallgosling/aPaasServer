<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class Room extends Model
{
    use HasFactory;
    public const STATUS_READY = 0;
    public const STATUS_ONLINE = 1;
    public const STATUS_CLOSE = 9;

    protected $table = 'fa_rooms';

    protected $fillable = [
        'id',
        'name',
        'descriptioin',
        'room_no',
        'user_id',
        'channel_id',
        'start_datetime',
        'end_datetime',
        'cover_image',
        'status',
    ];

    protected $casts = [
        'start_datetime' => 'datetime:Y-m-d h:i:s',
        'end_datetime' => 'datetime:Y-m-d h:i:s',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function getRoomList($status=0)
    {
        return Room::where('status', $status)->orderBy('id', 'desc')->limit(16)->lazy();
    }

    public static function findByRoomNo($roomNo)
    {
        return Room::where('room_no', $roomNo)->first();
    }

    public function sync($commodity)
    {
        if ($this->status == Room::STATUS_ONLINE) {
            //$auction = Auction::where('room_id', $this->id)->where('status', Auction::STATUS_SYNCING)->first();
            //$commodity = AuctionCommodity::where('auction_id', $auction->id)->orderBy('id', 'desc')->lazy()->toArray();
            if ($commodity) {
                Redis::set("ROOM_AUCTION_".$this->room_no, json_encode($commodity->toArray()));
                Log::info("Sync room: {$this->room_no} to Redis, Json:".json_encode($commodity));
                return true;
            }
            
        }
        return false;
    }

    // {
        //     "userNo": "8bNZe659Y6dd106851a9644F054ab7Z8",
        //     "password": "",
        //     "isPrivate": 0,
        //     "soundEffect": "0",
        //     "belCanto": "0",
        //     "name": "三里清风",
        //     "icon": "3"
        // }
}
