<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public const STATUS_READY = 0;
    public const STATUS_VALID = 1;
    public const STATUS_CLOSE = 9;

    protected $table = 'rooms';

    protected $fillable = [
        'id',
        'createNo',
        'roomNo',
        'password',
        'isPrivate',
        'soundEffect',
        'belCanto',
        'name',
        'icon',
        'roomPeopleNum'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];


    public function userCreator()
    {
        return $this->belongsTo(User::class, 'userNo', 'createNo');
    }

    public static function getRoomList($status=0)
    {
        return Room::where('status', $status)->orderBy('id', 'desc')->limit(16)->lazy();
    }

    public static function findByRoomNo($roomNo)
    {
        return Room::where('roomNo', $roomNo)->first();
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
