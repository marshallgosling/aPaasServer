<?php

namespace App\Services\Ent;

use Illuminate\Support\Facades\Redis;

class RoomSongService {

    public static function addRoomSong($roomNo, $song, $userNo)
    {
        $key = 'RoomSong-'.$roomNo;

        $index = self::getIndexRoomSong($roomNo);

        $index ++;

        $json = $song->toArray();
        $json['sort'] = $index;
        $json['user_no'] = $userNo;

        Redis::rpush($key, json_encode($json));

        self::increaseIndexRoomSong($roomNo, $index);
    }

    public static function delRoomSong($roomNo, $song, $userNo, $index)
    {
        $key = 'RoomSong-'.$roomNo;

        $json = $song->toArray();
        $json['sort'] = $index;
        $json['user_no'] = $userNo;
        
        Redis::lrem($key, 1, json_encode($json));
    }

    public static function switchSong($roomNo, $song, $userNo)
    {
        $key = 'RoomSong-'.$roomNo;
        
        Redis::lpop($key);
    }

    public static function getRoomSong($roomNo)
    {
        $key = 'RoomSong-'.$roomNo;

        $data = Redis::lrange($key,0, 100);
        $list = [];
        foreach ($data as $d) {
            $list[] = json_decode($d);
        }

        return $list;
    }

    public static function getIndexRoomSong($roomNo, $reset=false) {
        $key = 'RoomSong-index-'.$roomNo;
        if ($reset) {
            Redis::set($key, 1);
        }

        return (int)Redis::get($key);
    }

    public static function increaseIndexRoomSong($roomNo, $index) {
        $key = 'RoomSong-index-'.$roomNo;
        Redis::set($key, $index);
    }

    public static function resetRoomSong($roomNo) {
        $key = 'RoomSong-'.$roomNo;

        Redis::del($key);

        self::getIndexRoomSong($roomNo, true);
    }


    public static function begin($roomNo, $songNo, $userNo) {
        $key = "RoomSong-begin-$roomNo-$songNo";

        $starttime = time();

        $json = Redis::get($key);

        if ($json)
        {
            return false;
        }

        Redis::set($key, json_encode(compact($roomNo, $songNo, $userNo, $starttime)));

        return true;
    }

    public static function over($roomNo, $songNo, $userNo) {
        $key = "RoomSong-begin-$roomNo-$songNo";
        $endkey = "RoomSong-end-$roomNo-$songNo";

        $json = Redis::get($key);
        $json = json_decode($json, true);
        $json["endtime"] = time();

        Redis::del($key);
        Redis::set($endkey, json_encode($json));
        self::switchSong($roomNo, $songNo, $userNo);
    }

    public static function chorus($roomNo, $songNo, $userNo) {
        $key = "RoomSong-chorus-$roomNo-$songNo";

        $starttime = time();

        $json = Redis::get($key);

        if ($json)
        {
            return false;
        }

        Redis::set($key, json_encode(compact($roomNo, $songNo, $userNo, $starttime)));

        return true;
    }

    public static function cancelChorus($roomNo, $songNo, $userNo) {
        $key = "RoomSong-chorus-$roomNo-$songNo";
        $endkey = "RoomSong-endchorus-$roomNo-$songNo";

        $json = Redis::get($key);
        $json = json_decode($json, true);
        $json["endtime"] = time();

        if ($json)
        {
            Redis::del($key);
            Redis::set($endkey, json_encode($json));
            return true;
        }

        
        return false;
    }
}