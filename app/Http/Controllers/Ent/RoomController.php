<?php

namespace App\Http\Controllers\Ent;

use App\Http\Controllers\ApiController;
use App\Models\Ent\User;
use App\Models\Ent\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RoomController extends ApiController {

    protected $json = true;

    public function roomList() {

        $json = <<<JSON
        {"records": [],
        "total": 1,
        "size": 10,
        "current": 0,
        "orders": [],
        "optimizeCountSql": true,
        "searchCount": true,
        "countId": null,
        "maxLimit": null,
        "pages": 1}
        JSON;
        $data = json_decode($json, true);

        $records = Room::getRoomList();
        $data['records'] = $records;
    
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data];
        return $this->responseJson($result);
    }

    public function createRoom(Request $request) {
        $data = $request->all();
        $roomNo = Str::random(12);
        $userNo = $data["userNo"];
        $data["createNo"] = $data["userNo"];
        unset($data["userNo"]);

        $user = User::findByUserNo($userNo);
        if (!$user) {
            $result = ["code"=>102,"message"=>"UserNo {$userNo} is not exists.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
        }

        $data["roomNo"] = $roomNo;
        $room = Room::create($data);

        if (!$room) {
            $result = ["code"=>101,"message"=>"Failed to create room.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
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

        $json = <<<JSON
        {
            "id": 168,
            "onSeat": 0,
            "joinSing": 0,
            "userNo": "8bNZe659Y6dd106851a9644F054ab7Z8",
            "isVideoMuted": 0,
            "isSelfMuted": 0,
            "name": "Zoe",
            "headUrl": "https://beidou-ktv-user.oss-cn-beijing.aliyuncs.com/1658044831351WHndZm.png",
            "isMaster": true
        }
        JSON;

        $seat = json_decode($json, true);
        $seat['id'] = $user->id;
        $seat['userNo'] = $userNo;
        $seat["name"] = $user->name;
        $seat['headUrl'] = url("/storage/".$user->headUrl);

        Redis::set("Room_{$roomNo}_{$userNo}", json_encode($seat));

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$data["roomNo"]];
        return $this->responseJson($result);
    }

    public function updateRoom() {
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function getRoomInfo(Request $request)
    {
        $json = <<<JSON
        {
        "name": "三里清风",
        "creatorNo": "8bNZe659Y6dd106851a9644F054ab7Z8",
        "roomNo": "967eF7B15551XbD1b57cb19aZ42508d0",
        "isChorus": 0,
        "bgOption": "",
        "soundEffect": "0",
        "belCanto": "0",
        "code": "getRoomInfo",
        "time": 1661004484540,
        "roomUserInfoDTOList": [{
            "id": 168,
            "onSeat": 0,
            "joinSing": 0,
            "userNo": "8bNZe659Y6dd106851a9644F054ab7Z8",
            "isVideoMuted": 0,
            "isSelfMuted": 0,
            "name": "Zoe",
            "headUrl": "https://beidou-ktv-user.oss-cn-beijing.aliyuncs.com/1658044831351WHndZm.png",
            "isMaster": true
        }],
        "roomSongInfoDTOS": []
        }
        JSON;

        $roomNo = $request->get("roomNo");
        $room = Room::findByRoomNo($roomNo)->toArray();

        if (!$room) {
            $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
        }

        $room = $this->roomInfo($room);
        
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$room];
        return $this->responseJson($result);
    }

    private function getSeatsInfo($roomNo)
    {
        $keys = Redis::keys("Room_{$roomNo}_*");
        $seats = [];
        foreach ($keys as $key) {
            $seat = Redis::get($key);
            $seats[] = json_decode($seat, true);
        }

        return $seats;
    }

    private function roomInfo($room)
    {
        $room["code"] = "getRoomInfo";
        $room["time"] = time();

        $room["roomUserInfoDTOList"] = $this->getSeatsInfo($room['roomNo']);
        $room["roomSongInfoDTOS"] = [];
        return $room;
    }

    public function getRoomNum(Request $request) {
        $roomNo = $request->get("roomNo");
        $room = Room::findByRoomNo($roomNo)->toArray();

        if (!$room) {
            $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
        }
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$room];
        return $this->responseJson($result);
    }

    public function outRoom(Request $request) {

        $roomNo = $request->get("roomNo");
        $userNo = $request->get("userNo");

        $room = Room::findByRoomNo($roomNo);

        if (!$room) {
            $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
        }

        // $room->roomPeopleNum = 0;
        // $room->status = 9;
        // $room->save();

        // $key = "Room_{$roomNo}_{$userNo}";
        // Redis::del($key);

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function closeRoom(Request $request) {

        $roomNo = $request->get("roomNo");
        $keys = Redis::keys("Room_{$roomNo}_*");

        $room = Room::findByRoomNo($roomNo);

        if (!$room) {
            $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
            return $this->responseJson($result);
        }

        $room->roomPeopleNum = 0;
        $room->status = 9;
        $room->save();

        foreach ($keys as $key) {
            Redis::del($key);
        }

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }

    public function onSeat(Request $request) {
        $roomNo = $request->get("roomNo");
        $seatId = $request->get("seat");
        $userNo = $request->get("userNo");

        $key = "Room_{$roomNo}_{$userNo}";

        $seat = Redis::get($key);

        if (!$seat) {

            $user = User::findByUserNo($userNo);
            if (!$user) {
                $result = ["code"=>102,"message"=>"UserNo {$userNo} does not exist.","requestId"=>'',"data"=>''];
                return $this->responseJson($result);
            }

            $room = Room::findByRoomNo($roomNo);

            if (!$room) {
                $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
                return $this->responseJson($result);
            }
            $json = <<<JSON
            {
                "id": 168,
                "onSeat": 0,
                "joinSing": 0,
                "userNo": "8bNZe659Y6dd106851a9644F054ab7Z8",
                "isVideoMuted": 0,
                "isSelfMuted": 0,
                "name": "Zoe",
                "headUrl": "https://beidou-ktv-user.oss-cn-beijing.aliyuncs.com/1658044831351WHndZm.png",
                "isMaster": false
            }
            JSON;

            $seat = json_decode($json, true);
            $seat['id'] = $user->id;
            $seat['onSeat'] = $seatId;
            $seat['userNo'] = $userNo;
            $seat["name"] = $user->name;
            $seat['headUrl'] = url("/storage/".$user->headUrl);

            Redis::set("Room_{$roomNo}_{$userNo}", json_encode($seat));

            $room->roomPeopleNum = $room->roomPeopleNum + 1;
            $room->save();
        }


        $room = $this->roomInfo($room->toArray());

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>$room];
        return $this->responseJson($result);
    }

    public function outSeat(Request $request) {

        $roomNo = $request->get("roomNo");
        $seatId = $request->get("seat");
        $userNo = $request->get("userNo");
        $key = "Room_{$roomNo}_{$userNo}";
        if (Redis::get($key))
        {
            Redis::del($key);
            $room = Room::findByRoomNo($roomNo);

            if (!$room) {
                $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
                return $this->responseJson($result);
            }
            $room->roomPeopleNum = $room->roomPeopleNum - 1;
            $room->save();
        }
        

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->responseJson($result);
    }
}