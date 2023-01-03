<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public const STATUS_READY = 0;
    public const STATUS_VALID = 1;
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
