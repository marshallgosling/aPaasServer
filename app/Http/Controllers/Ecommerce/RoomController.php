<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\User;
use App\Models\Ecommerce\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RoomController extends ApiController {

    protected $json = true;

    public function list(Request $request) {
        $model = new Room;

        $page = intval($request->get('currpage', 1));
        $pagesize = intval($request->get('pagesize', 20));
        $offset = ($page - 1) * $pagesize;

        $query = $model->with(["user:id,user_no,email"]);

        $keywords = $request->get("keywords", '');
        if ($keywords) {
            $query = $query->where('name', 'like', '%'.$keywords.'%');
        }

        $data = $query->orderBy('id', 'desc')->offset($offset)->limit($pagesize)->get()->toArray();

        $count = $query->count();

        $result =[
            'rooms' => $data,
            'currpage' => $page,
            'pagesize' => $pagesize,
            'totalpage' => ceil($count / $pagesize),
            'totalrows' => $count
        ];

        return $this->responseJson($result);
    }

    public function info($roomNo) {
        $room = Room::findByRoomNo($roomNo);
        if(!$room) {
            return $this->err("404", "room not exists", 404);
        }
        $room = $room->toArray();
        $user = User::find($room['user_id']);

        $room['user'] = $user;
        $result =[
            'room' => $room
        ];

        return $this->succ($result);
    }

    public function create(Request $request) {
        $data = $request->all();

    }

    public function updateRoom() {
        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->succ($result);
    }


    public function closeRoom(Request $request) {

        $roomNo = $request->get("roomNo");
        $keys = Redis::keys("Room_{$roomNo}_*");

        $room = Room::findByRoomNo($roomNo);

        if (!$room) {
            $result = ["code"=>101,"message"=>"RoomNo {$roomNo} does not exist.","requestId"=>'',"data"=>''];
            return $this->succ($result);
        }

        $room->roomPeopleNum = 0;
        $room->status = 9;
        $room->save();

        foreach ($keys as $key) {
            Redis::del($key);
        }

        $result = ["code"=>0,"message"=>"success","requestId"=>'',"data"=>""];
        return $this->succ($result);
    }

}