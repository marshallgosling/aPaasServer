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

    public const FIELDS = ['song_no','song_name','song_url','image_url','singer','lyric'];

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

    public static function getPageList($name=0, $curr=0, $size = 20, $fields=['*'])
    {
        if ($name) {
            return Song::where('name', 'like', "%$name%")->select($fields)
                ->orderBy('id', 'desc')->offset($curr)->limit($size)->get();
        }
        else {
            return Song::orderBy('id', 'desc')->select($fields)
                ->offset($curr)->limit($size)->get();
        }
        
    }

    public static function findBySongNo($songNo, $fields=['*'])
    {
        return Song::where('song_no', $songNo)->select($fields)->first();
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
