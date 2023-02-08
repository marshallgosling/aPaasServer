<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\Room;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Auction;
use App\Models\Ecommerce\AuctionCommodity;
use App\Models\Ecommerce\Commodity;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

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

    public function sync(Request $request)
    {
        $data = $request->all();

        if (!Arr::exists($data, 'room_no')) {
            return $this->err('404', 'Room ID must not be null. ', 404);
        }

        $room = Room::findByRoomNo($data['room_no'])->first();
        if (!$room) {
            return $this->err('404', 'Room not exists. ', 404);
        }

        Auction::where('room_id', $room->id)
            //->where('status', Auction::STATUS_READY)
            ->update(['status'=>Auction::STATUS_SYNCING]);

    }

    

    public function isOnline($roomNo)
    {
        $room = Room::where("room_no", $roomNo)->first();
        if ($room && $room->status == Room::STATUS_ONLINE) {
            return "online";
        }
        else {
            return "offline";
        }
    }

}