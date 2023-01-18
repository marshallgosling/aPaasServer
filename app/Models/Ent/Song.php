<?php

namespace App\Models\Ent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public const STATUS_READY = 0;
    public const STATUS_VALID = 1;
    public const STATUS_CLOSE = 9;

    protected $table = 'songs';

    protected $fillable = [
        'id',
        'song_no',
        'song_name',
        'song_url',
        'image_url',
        'singer',
        'type',
        'status',
        'lyric'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    public static function getPageList($name=0, $curr=0, $size = 20)
    {
        if ($name) {
            return Song::where('name', 'like', "%$name%")->orderBy('id', 'desc')->offset($curr)->limit($size)->get();
        }
        else {
            return Song::orderBy('id', 'desc')->offset($curr)->limit($size)->get();
        }
        
    }

    public static function findBySongNo($songNo)
    {
        return Song::where('songNo', $songNo)->first();
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
