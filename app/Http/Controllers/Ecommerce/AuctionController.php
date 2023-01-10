<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Ecommerce\Auction;
use App\Models\Ecommerce\Commodity;
use App\Models\Ecommerce\Room;
use Illuminate\Http\Request;

class AuctionController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function list($roomNo, Request $request) {
        $model = new Auction();

        $room = Room::findByRoomNo($roomNo);

        if (!$room) {
            return $this->err('404', "Room $roomNo not exists.", 404);
        }

        $page = intval($request->get('currpage', 1));
        $pagesize = intval($request->get('pagesize', 20));
        $offset = ($page - 1) * $pagesize;

        $query = $model->with(['user:id,user_no','commodity'])->where('room_id', $room->id);

        $keywords = $request->get("keywords", '');
        if ($keywords) {
            $query = $query->where('name', 'like', '%'.$keywords.'%');
        }

        $data = $query->orderBy('id', 'desc')->offset($offset)->limit($pagesize)->get()->toArray();

        $count = $query->count();

        $result =[
            'auction' => $data,
            'currpage' => $page,
            'pagesize' => $pagesize,
            'totalpage' => ceil($count / $pagesize),
            'totalrows' => $count
        ];

        return $this->succ($result);
    }

    public function detail($auctionId)
    {
        $auction = Auction::with(['user:id,user_no','commodity'])->find($auctionId);

        if (!$auction) {
            return $this->err('404', 'Auction not exists', 404);
        }

        $auction = $auction->toArray();

        return $this->succ(['auction' => $auction]);
    }

}
