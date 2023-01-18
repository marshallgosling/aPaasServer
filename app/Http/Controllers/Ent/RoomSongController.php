<?php

namespace App\Http\Controllers\Ent;

use App\Http\Controllers\ApiController;
use App\Models\Ent\User;
use App\Models\Ent\Song;
use App\Services\Ent\RoomSongService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RoomSongController extends ApiController {

    protected $json = true;

    public function haveOrderedList(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $data = RoomSongService::getRoomSong($roomNo);

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data];
        return $this->responseJson($result);
    }

    public function chooseSong(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $userNo = $request->get('userNo', '');
        $isChorus = $request->get('isChorus', '0');

        $song = Song::findByNo($songNo);

        if ($song) {
            RoomSongService::addRoomSong($roomNo, $song, '');
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

    public function delSong(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $sort = $request->get('sort', '');

        $song = Song::findByNo($songNo);

        if ($song) {
            RoomSongService::delRoomSong($roomNo, $song, '', $sort);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

    public function begin(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $userNo = $request->get('userNo', '');

        $song = Song::findByNo($songNo);

        if ($song) {
            if (RoomSongService::begin($roomNo, $songNo, $userNo))
            {
                $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
            }
            else {
                $result = ["code"=>455,"message"=>"The song is started","requestId"=>'',"data"=>null];
            }
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

    public function over(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $userNo = $request->get('userNo', '');

        $song = Song::findByNo($songNo);

        if ($song) {
            RoomSongService::over($roomNo, $songNo, $userNo);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

    public function chorus(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $userNo = $request->get('userNo', '');

        $song = Song::findByNo($songNo);

        if ($song) {
            RoomSongService::chorus($roomNo, $songNo, $userNo);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

    public function cancelChorus(Request $request)
    {
        $roomNo = $request->get('roomNo', '');
        $songNo = $request->get('songNo', '');
        $userNo = $request->get('userNo', '');

        $song = Song::findByNo($songNo);

        if ($song) {
            RoomSongService::cancelChorus($roomNo, $songNo, $userNo);
            $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>null];
        }
        else {
            $result = ["code"=>404,"message"=>"missing","requestId"=>'',"data"=>null];
        }
        
        return $this->responseJson($result);
    }

}